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
        Schema::table('donhang', function (Blueprint $table) {
            $table->bigInteger('id_user')->unsigned(); 
            $table->string('gia_tong')->nullable();
            $table->string('tensanpham')->nullable();
            $table->string('mau')->nullable();
            $table->string('size')->nullable();
            $table->string('gia')->nullable();
            $table->string('soluong')->nullable();
            $table->string('hinhanh')->nullable();
            $table->string('thanh_tien')->nullable();
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
