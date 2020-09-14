<?php

namespace App\Http\Controllers;

use App\Models\ActiveGuest;
use Illuminate\Http\Request;
use App\Http\Requests\AuthenticateAccessCode;

class ActiveGuestController extends Controller
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
    public function store(AuthenticateAccessCode $request)
    {
        if ($request->authenticate()) {
            return redirect()->intended();
        }

        return redirect()->back()->withErrors(['code' => 'You could not be authenticated.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ActiveGuest  $activeGuest
     * @return \Illuminate\Http\Response
     */
    public function show(ActiveGuest $activeGuest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ActiveGuest  $activeGuest
     * @return \Illuminate\Http\Response
     */
    public function edit(ActiveGuest $activeGuest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ActiveGuest  $activeGuest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ActiveGuest $activeGuest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ActiveGuest  $activeGuest
     * @return \Illuminate\Http\Response
     */
    public function destroy(ActiveGuest $activeGuest)
    {
        //
    }
}
