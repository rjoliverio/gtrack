<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
class DriverMiddleware
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
        $user = Auth::user();
        if($user!=null){
            if($user->user_type=='Driver')
            {
                //you can throw a 401 unauthorized error here instead of redirecting back
                return $next($request);//this redirects all non-admins back to their previous url's
            }else{
                return redirect('/admin/dashboard');
            }
        }
        return redirect('/');
    }
}
