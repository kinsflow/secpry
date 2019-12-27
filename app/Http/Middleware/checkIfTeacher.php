<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class checkIfTeacher
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
        if(Auth::user()->roles[0]->id != 1)
        {
            return redirect(route('login'));
//                ->with(['message', 'you are currently logged out kindly get an access key into the system']);
        }
        return $next($request);
    }
}
