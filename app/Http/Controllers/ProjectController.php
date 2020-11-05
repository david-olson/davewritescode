<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectSection;
use Illuminate\Http\Request;

class ProjectController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('admin.projects.single', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $this->processProject($request, $project);

        return redirect(route('admin.projects.show', $project->slug));
    }


    public function processProject($request, Project $project = null)
    {
        $data = $request->only(['title', 'tech', 'role', 'site_address', 'description', 'challenges']);

        if ($project) {
            $project->update($data);
        } else {
            $project = Project::create($data);
        }

        if ($request->primary_image) {
            $project->media_id = $request->primary_image[1]['id'];
            $project->save();
        } else {
            $project->media_id = null;
            $project->save();
        }

        $n = 1;
        $sections = $request->section;
        $section_ids = $project->sections()->pluck('id')->toArray();
        $added_ids = [];

        if ($sections) {
            foreach($sections as $section) {
                $section['order'] = $n;
                $section['project_id'] = $project->id;

                if (array_key_exists('primary_image', $section)) {
                    $section['media_id'] = $section['primary_image'][1]['id'];
                }
                if (array_key_exists('id', $section)) {
                    $pro_section = ProjectSection::find($section['id']);
                    $pro_section->update($section);
                } else {
                    $pro_section = ProjectSection::create($section);
                }

                $added_ids[] = $pro_section->id;

                ++$n;
            }
        }
        $removed_sections = array_diff($section_ids, $added_ids);
        $removedSecs = ProjectSection::whereIn('id', $removed_sections)->delete();

        return $project;

    }
}
