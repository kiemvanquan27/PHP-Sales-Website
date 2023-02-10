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
        Schema::table('donhang_sanpham', function (Blueprint $table) {
            $table->string('tensanpham')->nullable();
            $table->string('mau')->nullable();
            $table->string('size')->nullable();
            $table->string('gia')->nullable();
            $table->string('soluong')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
