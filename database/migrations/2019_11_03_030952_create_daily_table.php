<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDailyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('users_id')->unsigned();
            //$table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->date('day');
            $table->time('jobstart');
            $table->time('jobend');
            $table->time('breakstart')->nullable();
            $table->time('breakend')->nullable();
            $table->string('timetable');
            $table->string('impress')->nullable();
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
        Schema::dropIfExists('daily');
    }
}
