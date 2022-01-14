<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $role)
    {
        // $user = Auth::user();
        // if (($role == 'admin' && !$user->is_admin) || ($role == 'user' && $user->is_admin)) {
        //     abort(403);
        // }
        // elseif (($role == 'student' && !$user->occupation=="Mahasiswa") || ($role == 'teacher' && !$user->occupation=='Guru') || ($role == 'alumni' && !$user->occupation == "Alumni")) {
        //     abort(403);
        // }
        // return $next($request);
        $user = Auth::user();
        if (($role == 'admin' && $user->is_admin) || ($role == 'user' && !$user->is_admin)) {
            return $next($request);
        } elseif (($role == 'student' && $user->occupation=="Mahasiswa") || ($role == 'teacher' && $user->occupation=='Guru') || ($role == 'alumni' && $user->occupation == "Alumni")){
            return $next($request);
        } else {
            return redirect('/');
        }
    }
}
