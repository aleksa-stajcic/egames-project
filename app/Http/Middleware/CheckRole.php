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
    public function handle($request, Closure $next, ...$roles)
    {
        if(!\in_array($request->session()->get('user')->RoleName, $roles)){
            return \redirect(\route('home'));
        }
        // if($request->session()->get('user')->RoleName != $role){
        //     return \redirect(\route('home'));
        // }

        return $next($request);
    }
}
