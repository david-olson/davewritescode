<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;

class PublicProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::orderBy('order')->get();
        $guest = (session('active_guest_id')) ? session('active_guest_id') : null;

        DB::table('guest_action')->insert([
            'guest_id' => $guest,
            'action' => 'projects_overview_view',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);


        return view('public.projects.index', compact('projects'));
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        $ignore = $project->sections()->where('type', 'media')->limit($project->image_count)->pluck('id')->toArray();

        $guest = (session('active_guest_id')) ? session('active_guest_id') : null;

        DB::table('guest_action')->insert([
           'guest_id' => $guest,
           'action' => 'projects_single_view',
           'value' => $project->id,
           'created_at' => Carbon::now(),
           'updated_at' => Carbon::now(),
        ]);

        return view('public.projects.show', compact('project', 'ignore'));
    }

}
