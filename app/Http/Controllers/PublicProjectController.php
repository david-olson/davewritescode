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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
    }
}
