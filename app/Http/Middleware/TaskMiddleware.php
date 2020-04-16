<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class TaskMiddleware
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
        if(!Auth::user()){
            session()->flash('middlewared', 'Please Login to Add\Update\Delete the task that BELONGS to you (middleware)');
            return redirect('/');
        }

        return $next($request);
    }
}
