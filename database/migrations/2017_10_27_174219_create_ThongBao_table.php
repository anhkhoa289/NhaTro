<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThongBaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ThongBao', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('loaiTB')->unsigned();
            $table->integer('TK_id')->unsigned();
            $table->bigInteger('maLienKet'); // maPhong
            $table->string('noiDung', 1000)->nullable();
            $table->boolean('tinhTrangXem')->default(0);
            $table->dateTime('thGianCapNhat')->nullable();
            $table->timestamps();
            $table->foreign('LoaiTB')->references('id')->on('LoaiThongBao')
            ->onDelete('set null')->onUpdate('cascade');
            $table->foreign('TK_id')->references('id')->on('TaiKhoan')
            ->onDelete('set null')->onUpdate('cascade');
            $table->foreign('maLienKet')->references('maPhong')->on('PhongTro')
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
        Schema::dropIfExists('ThongBao');
    }
}
