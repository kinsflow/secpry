<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class checkAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::user() != true)
        {
            return redirect(route('login'));
//                ->with(['message', 'you are currently logged out kindly get an access key into the system']);
        }
        return $next($request);
    }
}
