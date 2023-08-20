<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('slug')->unique();
            $table->string('image')->unique()->comment('Anh bai viet');
            $table->longText('content')->unique()->comment('Noi dung');
            $table->integer('category_id')->nullable()->comment('ID danh muc');
            $table->integer('status')->nullable()->comment('1: Hoat dong, 0: Ko hoat dong');
            $table->tinyInteger('is_slide')->nullable()->comment('Co phai slide?');
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
        Schema::dropIfExists('posts');
    }
}
