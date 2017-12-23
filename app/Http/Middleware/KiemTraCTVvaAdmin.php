<?php

namespace App\Http\Middleware;

use Closure;

class KiemTraCTVvaAdmin
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
        if(Session()->get('TaiKhoan.loaiTK') == 3 || Session()->get('TaiKhoan.loaiTK') == 2)
            return $next($request);
        else
            return abort(404);
    }
}
