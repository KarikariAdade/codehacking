<?php

namespace App\Http\Middleware;

//Import the Auth Facade to validate user role

use Closure;
// use App\User;
use Illuminate\Support\Facades\Auth;

//Register this middleware at App/http/kernel
//you then create a route group at the routes
class Admin
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
        //Check auth for user roles
        // the isAdmin class is from Users Model
        if(Auth::check()){
            if(Auth::user()->isAdmin()){
                return $next($request);
            }
        }
        return redirect(route('custom404'));
        
    }
}
