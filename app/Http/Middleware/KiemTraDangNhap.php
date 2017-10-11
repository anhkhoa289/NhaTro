<?php

namespace App\Http\Middleware;

use Closure;

class KiemTraDangNhap
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
        if(!Session()->has('TaiKhoan')) 
            return redirect('DangNhap');
        else
            return $next($request);
    }
}
