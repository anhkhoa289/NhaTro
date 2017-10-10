<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhongTroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('PhongTro', function (Blueprint $table) {
            $table->increments('maPhong');
            $table->char('tenPhong', 100);
            $table->char('noiDung', 255);
            $table->integer('tongSoPhong')->unsigned();
            $table->decimal('gia', 9, 0);
            $table->char('tinh', 50);
            $table->char('quan', 50);
            $table->char('phuong', 50);
            $table->char('diaChi', 255);
            $table->char('chuNha', 255);
            $table->integer('luotClick')->unsigned();
            $table->integer('luotPhanHoi')->unsigned();
            $table->char('CTVduyet', 255);
            $table->boolean('tinhTrangDuyet')->default(0);
            $table->boolean('tinhTrangHienThi')->default(0);
            $table->timestamps();
            $table->foreign('chuNha')->references('tenDangNhap')->on('TaiKhoan')
            ->onDelete('set null')->onUpdate('cascade');
            $table->foreign('CTVduyet')->references('tenDangNhap')->on('TaiKhoan')
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
        Schema::dropIfExists('PhongTro');
    }
}
