<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // $this->app->bind('App\Repository\LoaiTaiKhoanRepository', function(){
        //     //$a = new App\Model\LoaiTaiKhoan();
        //     //return new App\Model\LoaiTaiKhoanRepository($a);
        // });
        //$LoaiTaiKhoanRepository = app('LoaiTaiKhoanRepository');
        $this->app->bind('dienroi',function(){
            return 'dien gan';
        });
    }
}
