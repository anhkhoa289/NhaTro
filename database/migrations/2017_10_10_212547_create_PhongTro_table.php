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
            $table->bigIncrements('maPhong');
            $table->char('tenPhong', 100);
            $table->string('noiDung', 1000);
            $table->integer('tongSoPhong')->unsigned()->default(1);
            $table->integer('soPhongTrong')->unsigned()->default(1);
            $table->integer('dienTich')->unsigned();
            $table->double('gia', 9, 0);
            $table->char('tinh', 50);
            $table->char('quan', 50);
            $table->char('phuong', 50);
            $table->char('diaChi', 255);
            $table->bigInteger('chuNha');
            $table->integer('luotClick')->unsigned()->default(0);
            $table->bigInteger('luotPhanHoi')->unsigned()->default(0);
            $table->bigInteger('CTVduyet')->nullable();
            $table->boolean('tinhTrangDuyet')->default(0);
            $table->boolean('tinhTrangHienThi')->default(1);
            $table->char('pathImg', 255)->nullable();
            $table->timestamps();
            $table->foreign('chuNha')->references('id')->on('TaiKhoan')
            ->onDelete('set null')->onUpdate('cascade');
            $table->foreign('CTVduyet')->references('id')->on('TaiKhoan')
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
