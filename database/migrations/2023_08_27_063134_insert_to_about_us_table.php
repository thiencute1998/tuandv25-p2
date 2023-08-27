<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InsertToAboutUsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('about_us', function (Blueprint $table) {
            //
            \Illuminate\Support\Facades\DB::statement("INSERT INTO `about_us` (`id`, `gioithieu`) VALUES(1, '');");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('about_us', function (Blueprint $table) {
            //
        });
    }
}
