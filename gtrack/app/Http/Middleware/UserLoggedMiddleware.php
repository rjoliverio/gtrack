<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Http\Request;

class UserLoggedMiddleware
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
        if(Auth::check()){
            $user = Auth::user();
            if($user->user_type=='Admin')
            {
                //you can throw a 401 unauthorized error here instead of redirecting back
                return redirect('/admin/dashboard');//this redirects all non-admins back to their previous url's
            }else{
                return redirect('/driver/schedule');
            }
        }
        return $next($request);
    }
}
