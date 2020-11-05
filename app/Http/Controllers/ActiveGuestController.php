<?php

namespace App\Http\Controllers;

use App\Models\ActiveGuest;
use Illuminate\Http\Request;
use App\Http\Requests\AuthenticateAccessCode;
use DB;
use Carbon\Carbon;

class ActiveGuestController extends Controller
{

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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ActiveGuest  $activeGuest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $guest = (session('active_guest_id')) ? session('active_guest_id') : null;
        $action = $request->action;
        $value = $request->value;
        DB::table('guest_action')->insert([
           'guest_id' => $guest,
           'action' => $action,
           'value' => $value,
           'created_at' => Carbon::now(),
           'updated_at' => Carbon::now(),
        ]);
    }

}
