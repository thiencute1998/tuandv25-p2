<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalenderEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calender_events', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('image')->nullable();
            $table->date('d_date')->nullable()->comment('Lich');
            $table->string('address')->nullable()->comment('Dia chi');
            $table->longText('content')->nullable()->comment('Noi dung');
            $table->integer('view_count')->nullable()->comment('So luot xem');
            $table->string('author')->nullable()->comment('Tac gia');
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
        Schema::dropIfExists('calender_events');
    }
}
