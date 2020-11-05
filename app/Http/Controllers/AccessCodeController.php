<?php

namespace App\Http\Controllers;

use App\Models\AccessCode;
use Illuminate\Http\Request;

class AccessCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accessCodes = AccessCode::all();
        return view('admin.access-codes.index', compact('accessCodes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.access-codes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $code = AccessCode::create($request->all());

        return redirect(route('admin.access-codes.index'))->with('message.style', 'success')->with('message.text', 'Access Code created successfully.');
    }

}
