<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
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
        //check if request is user
        if($request->user()=== null) //not user
        {
            return redirect('/posts');
        }

        //check routes
        $actions = $request->route()->getAction();
        //get roles of route
        $roles = isset($actions['roles']) ? $actions['roles'] : null; // if condition in another way
        
        //check roles
        if($request->user()->hasAnyRole($roles) || !$roles)
        {
        return $next($request);
        }
        return redirect('/accsess-denied');
    }
}
