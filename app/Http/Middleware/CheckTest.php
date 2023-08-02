<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckTest
{
    /**
     * Handle an incoming request.
     *
     *
     */
    public function handle(Request $request, Closure $next)
    {

        $admin = session('role');

        if ($admin == 3) {

        return $next($request);
        }
        return redirect()->route('login');

    }
}
