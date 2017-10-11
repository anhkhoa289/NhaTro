<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

use App\Repository\TaiKhoanRepository;
use App\Repository\HinhAnhPhongTroRepository;
use App\Repository\PhongTroRepository;
use App\Model\TaiKhoan;
use App\Model\HinhAnhPhongTro;
use App\Model\PhongTro;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(255);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('TaiKhoanRepository', function(){
            $tk = new TaiKhoan();
            return new TaiKhoanRepository($tk);
        });
        $this->app->bind('HinhAnhPhongTroRepository',function(){
            $ha = new HinhAnhPhongTro();
            return new HinhAnhPhongTroRepository($ha);
        });
        $this->app->bind('PhongTroRepository',function(){
            $pt = new PhongTro();
            return new PhongTroRepository($pt);
        });
        $this->app->bind('codeCreate',function(){
            $length = 6;
            $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
            $size = strlen( $chars );
            $str = '';
            for( $i = 0; $i < $length; $i++ ) {
                $str .= $chars[ rand( 0, $size - 1 ) ];
            }
            $str = substr( str_shuffle( $chars ), 0, $length );
            return $str;
        });
    }
}
