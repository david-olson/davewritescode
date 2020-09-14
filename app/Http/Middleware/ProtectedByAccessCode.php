<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\ActiveGuest;

class ProtectedByAccessCode
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($activeGuestId = session('active_guest_id')) {
            $activeGuest = ActiveGuest::find($activeGuestId);
            if ($activeGuest && $activeGuest->expires_at->isFuture()) {
                return $next($request);
            }
        }
        session()->put('url.intended', url()->current());
        return redirect(route('public.access-code'));
    }
}
