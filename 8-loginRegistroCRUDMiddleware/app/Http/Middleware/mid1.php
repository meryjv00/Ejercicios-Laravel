<?php

namespace App\Http\Middleware;

use Closure;

class mid1 {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        //Ha iniciado sesión
        if (\Session::get('persona') != null) {
            return $next($request);
        } else {
            abort(518);
        }
    }

}
