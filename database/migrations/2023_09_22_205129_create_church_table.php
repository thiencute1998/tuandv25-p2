<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChurchTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('churchs', function (Blueprint $table) {
            $table->id();
            $table->string('province', 100)->nullable();
            $table->string('district', 100)->nullable();
            $table->string('commune', 100)->nullable();
            $table->string('village', 100)->nullable();
            $table->string('parish', 100)->nullable();
            $table->text('linkgmap')->nullable();
            $table->integer('status')->nullable()->comment('1: Hoat dong, 0: Ko hoat dong');
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
        Schema::dropIfExists('churchs');
    }
}
