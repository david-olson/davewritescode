<?php

namespace App\Http\Controllers;

use App\Models\AccessCode;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class PublicAccessCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        DB::table('guest_action')->insert([
            'action' => 'access_page_view',
            'value' => $request->ip(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        return view('public.access-code');
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
     * @param  \App\Models\AccessCode  $accessCode
     * @return \Illuminate\Http\Response
     */
    public function show(AccessCode $accessCode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AccessCode  $accessCode
     * @return \Illuminate\Http\Response
     */
    public function edit(AccessCode $accessCode)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AccessCode  $accessCode
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AccessCode $accessCode)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AccessCode  $accessCode
     * @return \Illuminate\Http\Response
     */
    public function destroy(AccessCode $accessCode)
    {
        //
    }
}
