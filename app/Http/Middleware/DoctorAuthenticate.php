<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class DoctorAuthenticate
{

    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check() && Auth::user()->role==2){
            return $next($request);
        }
        return redirect()->route('doc.login');
    }
}
