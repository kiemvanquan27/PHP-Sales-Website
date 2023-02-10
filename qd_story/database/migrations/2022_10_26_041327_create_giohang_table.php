<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('giohang', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger('id_danhmuc')->unsigned(); 
            $table->bigInteger('id_sanpham')->unsigned(); 
            $table->string('tensanpham')->nullable();
            $table->string('mau')->nullable();
            $table->string('size')->nullable();
            $table->string('gia')->nullable();
            $table->string('soluong')->nullable();
            $table->string('hinhanh')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('giohang');
    }
};
