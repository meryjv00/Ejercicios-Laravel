<?php

namespace App\Http\Middleware;

use Closure;

class mid3 {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        //Es usuario estándar
        if (\Session::get('persona')->getRol() == 1) {
            return $next($request);
        } else {
            abort(520);
        }
    }

}
