<?php

namespace FotoPrisma\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Guard;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */

    protected $auth;

    public function __construct (Guard $guard) {
        $this->auth = $guard;
    }

    public function handle($request, Closure $next, $guard = null)
    {
        //return dd([Auth::guard($guard)->check(), Auth::guard($guard), Auth::user()]);
        if (Auth::guard($guard)->check()) {

            //return dd([Auth::guard($guard)->check(), Auth::guard($guard), Auth::user()]);
            $rol = Auth::user()->usuario->idRol;
            if ($rol == 1) {
                return redirect()->route('admin.administrador');
            } else if ($rol == 2) {
                return redirect()->route('cliente.solicitud');
            }

            //return redirect('/');
        }

        return $next($request);
    }
}
