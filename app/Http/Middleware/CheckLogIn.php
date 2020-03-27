<?php

namespace App\Http\Middleware;

use Closure;

class CheckLogIn
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param bool $login
     * @return mixed
     */
    public function handle($request, Closure $next, $login)
    {
        $l = (int)$login;
        $j = (bool)$l;

        if($request->session()->has('user') != $j){
            return \redirect(\route('home'));
        }

        return $next($request);
    }
}
