<?php

namespace App\Http\Middleware;

use Closure;

class mid2 {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        //Es administrador
        if (\Session::get('persona')->getRol() == 2) {
            return $next($request);
        } else {
            abort(520);
        }
    }

}
