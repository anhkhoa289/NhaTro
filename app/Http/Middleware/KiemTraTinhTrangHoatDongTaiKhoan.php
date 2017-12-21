<?php

namespace App\Http\Middleware;

use Closure;

class KiemTraTinhTrangHoatDongTaiKhoan
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
        if(Session()->get('TaiKhoan.tinhTrangHoatDong') == 0)
            return redirect('Account/XacThucTaiKhoan');
        else
            return $next($request);
    }
}
