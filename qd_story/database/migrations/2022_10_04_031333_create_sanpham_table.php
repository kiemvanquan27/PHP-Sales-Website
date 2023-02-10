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
        Schema::create('sanpham', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('tensanpham')->nullable();
            $table->bigInteger('id_danhmuc')->unsigned(); 
            $table->string('mau')->nullable();
            $table->string('size')->nullable();
            $table->string('gia')->nullable();
            $table->string('soluong')->nullable();
            $table->string('kichhoat')->nullable();
            $table->longText('motasanpham')->nullable();
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
        Schema::dropIfExists('sanpham');
    }
    
};
