<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatChoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('DatCho', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('sdtKhachHang', 15);
            $table->bigInteger('TB_id');
            $table->timestamps();
            $table->foreign('TB_id')->references('id')->on('ThongBao')
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
        Schema::dropIfExists('DatCho');
    }
}
