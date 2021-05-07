<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('address');
            $table->time('start_time');
            $table->time('end_time');
            $table->string('tel')->nullable();
            $table->string('url')->nullable();
            $table->text('caution')->nullable();
            $table->string('image')->nullable();
            $table->text('content')->nullable();
            $table->integer('wifi');
            $table->integer('outlet');
            $table->integer('credit');
            $table->integer('smoke');
            $table->integer('pet');
            $table->integer('liquor');
            $table->integer('coffee');
            $table->integer('voice');
            $table->integer('capacity');
            $table->integer('cuisine');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('shops');
    }
}
