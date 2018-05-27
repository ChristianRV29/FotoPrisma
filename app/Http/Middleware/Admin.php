<?php

namespace FotoPrisma\Http\Middleware;

use Illuminate\Contracts\Auth\Guard;
use Closure;
use Auth;
use Session;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    protected $auth;

    public function __construct (Guard $guard) {
        $this->auth = $guard;
    }

    public function handle($request, Closure $next)
    {
        if ($this->auth->user()->usuario->idRol == 1){
            return $next($request);
        } else {
            dd('No esta autorizado');
        }


        //$this->auth->user()->
    }
}
