<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaikhoanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taikhoan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('holot', 100);
            $table->char('ten', 30);
            //$table->char('gioiTinh', 1);
            $table->enum('gioiTinh', ['M', 'F', 'U']);
            $table->date('ngSinh');
            $table->char('email', 200)->nullable();
            $table->char('sdt', 15);
            $table->char('tinh', 50);
            $table->char('quan', 50);
            $table->char('phuong', 50);
            $table->char('diaChi', 255);
            $table->boolean('khoaTaiKhoan')->default(0);
            $table->boolean('tinhTrangHoatDong')->default(0);
            $table->integer('slgThongBao')->unsigned()->default(0);// new
            $table->integer('slgPhongTroSoHuu')->default(0);
            $table->integer('slgDatCho')->default(0);
            $table->integer('slgDuyet')->unsigned()->default(0);// new (Just for CTV and Admin)
            $table->char('maKichHoat', 6)->nullable();
            $table->char('tenDangNhap', 255)->unique();
            $table->char('matkhau', 255);
            $table->integer('loaiTK')->unsigned()->default(1);
            $table->char('CTVHoTro', 255)->nullable();
            $table->rememberToken();
            $table->char('avatar', 255)->nullable();
            $table->timestamps();
            $table->foreign('CTVHoTro')->references('tenDangNhap')->on('TaiKhoan')
            ->onDelete('set null')->onUpdate('cascade');
            $table->foreign('loaiTK')->references('loaiTK')->on('LoaiTaiKhoan')
            ->onDelete('set null')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('taikhoan');
    }
}
