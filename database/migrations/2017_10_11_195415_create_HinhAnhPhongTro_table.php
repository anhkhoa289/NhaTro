<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHinhAnhPhongTroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('HinhAnhPhongTro', function (Blueprint $table) {
            $table->bigInteger('maPhong')->unsigned();
            $table->char('pathImg', 255);
            $table->timestamps();
            $table->foreign('maPhong')->references('maPhong')->on('PhongTro')
            ->onDelete('set null')->onUpdate('cascade');
            $table->primary(['maPhong', 'pathImg']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('HinhAnhPhongTro');
    }
}
