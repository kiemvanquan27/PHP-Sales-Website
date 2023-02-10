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
            $table->dropColumn('gia');
            $table->dropColumn('mau');
            $table->dropColumn('id_danhmuc');
            $table->dropColumn('id_giohang');
            $table->dropColumn('hinhanh');
            $table->dropColumn('tensanpham');
            $table->dropColumn('size');
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
