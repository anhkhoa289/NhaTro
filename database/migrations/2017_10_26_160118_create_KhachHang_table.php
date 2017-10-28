<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKhachHangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('KhachHang', function (Blueprint $table) {
            $table->char('sdtKhachHang',15);
            $table->char('email', 200)->nullable();
            $table->integer('soLuotPhanHoiNgay')->unsigned()->default(0);
            $table->integer('soLuotPhanHoiThang')->unsigned()->default(0);
            $table->char('maXacNhan', 6)->nullable();
            $table->boolean('tinhTrangDatCho')->default(0);
            $table->timestamps();
            $table->primary('sdtKhachHang');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('KhachHang');
    }
}
