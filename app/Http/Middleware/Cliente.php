<?php

namespace FotoPrisma\Http\Middleware;

use Illuminate\Contracts\Auth\Guard;
use Closure;
use Auth;
use Session;

class Cliente
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
        //dd([$this->auth->user(), $this->auth->user()->usuario, $this->auth->user()->usuario->idRol]);
        if ($this->auth->user()->usuario->idRol == 2){
            return $next($request);
        } else {
            dd('No tiene acceso a este modulo');
        }
    }
}
