<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoutineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('routine', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('users_id');
            //$table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('jobname');
            $table->string('set')->nullable();
            $table->string('settime')->nullable();
            $table->string('content');
            $table->string('manual')->nullable();
            $table->string('important');
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
        Schema::dropIfExists('routine');
    }
}
