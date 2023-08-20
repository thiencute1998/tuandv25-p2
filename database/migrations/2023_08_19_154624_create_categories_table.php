<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('slug')->unique();
            $table->tinyInteger('level')->nullable()->comment('Cap danh muc');
            $table->integer('parent_id')->nullable()->comment('ID danh muc cha');
            $table->integer('status')->nullable()->comment('1: Hoat dong, 0: Ko hoat dong');
            $table->tinyInteger('order')->nullable()->comment('Thu tu');
            $table->integer('homepage_post_id')->nullable()->comment('ID danh muc trang chu');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
