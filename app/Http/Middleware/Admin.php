<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure  $next
     * @return mixed
     */
  public function handle(Request $request, Closure $next): Response
    {
        if (Auth::user()->usertype != 'admin') {
            return redirect('dashboard');
        }

        return $next($request);
    }
}
