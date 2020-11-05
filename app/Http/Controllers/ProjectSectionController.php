<?php

namespace App\Http\Controllers;

use App\Models\ProjectSection;
use Illuminate\Http\Request;

class ProjectSectionController extends Controller
{

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

}
