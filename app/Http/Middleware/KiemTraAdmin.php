<?php

namespace App\Http\Middleware;

use Closure;

class KiemTraAdmin
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
        if(Session()->get('TaiKhoan.loaiTK') != 3)
            return abort(404);
        else
            return $next($request);
    }
}
