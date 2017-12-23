<?php

namespace App\Http\Middleware;

use Closure;

class KiemTraKhoaTaiKhoan
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
        if((Session()->get('TaiKhoan.khoaTaiKhoan') == 1))
            return redirect('CanhBao');
        else
            return $next($request);
    }
}
