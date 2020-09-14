<?php

namespace App\Http\Controllers;

use App\Models\ProjectSection;
use Illuminate\Http\Request;

class ProjectSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $count = $request->count;
        return response()->json([
            'view' => view('admin.projects.form-components.section', compact('count'))->render()
        ]);
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
     * @param  \App\Models\ProjectSection  $projectSection
     * @return \Illuminate\Http\Response
     */
    public function show(ProjectSection $projectSection)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProjectSection  $projectSection
     * @return \Illuminate\Http\Response
     */
    public function edit(ProjectSection $projectSection)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProjectSection  $projectSection
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProjectSection $projectSection)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProjectSection  $projectSection
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProjectSection $projectSection)
    {
        //
    }
}
