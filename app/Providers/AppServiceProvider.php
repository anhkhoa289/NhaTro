<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

use App\Repository\LoaiTaiKhoanRepository;
use App\Repository\LoaiThongBaoRepository;
use App\Repository\TaiKhoanRepository;
use App\Repository\HinhAnhPhongTroRepository;
use App\Repository\PhongTroRepository;
use App\Repository\DiaPhuongRepository;
use App\Repository\KhachHangRepository;
use App\Repository\ThongBaoRepository;
use App\Repository\DatChoRepository;
use App\Model\LoaiTaiKhoan;
use App\Model\LoaiThongBao;
use App\Model\TaiKhoan;
use App\Model\HinhAnhPhongTro;
use App\Model\PhongTro;
use App\Model\KhachHang;
use App\Model\ThongBao;
use App\Model\DatCho;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(2000);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('LoaiTaiKhoanRepository', function(){
            $ltk = new LoaiTaiKhoan();
            return new LoaiTaiKhoanRepository($ltk);
        });
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
        $this->app->bind('KhachHangRepository',function(){
            $kh = new KhachHang();
            return new KhachHangRepository($kh);
        });
        $this->app->bind('LoaiThongBaoRepository', function(){
            $ltb = new LoaiThongBao();
            return new LoaiThongBaoRepository($ltb);
        });
        $this->app->bind('ThongBaoRepository',function(){
            $tb = new ThongBao();
            return new ThongBaoRepository($tb);
        });
        $this->app->bind('DatChoRepository',function(){
            $dc = new DatCho();
            return new DatChoRepository($dc);
        });
        
        
        $this->app->bind('DiaPhuongRepository', function ($app) {
            return new DiaPhuongRepository();
        });
        $this->app->bind('DiaPhuong', function ($app) {
            return app('DiaPhuongRepository')->all();
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
