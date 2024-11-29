<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCardMovementsTable extends Migration
{
    public function up()
    {
        Schema::create('card_movements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('card_id');
            $table->unsignedBigInteger('previous_stage_id');
            $table->unsignedBigInteger('new_stage_id');
            $table->unsignedBigInteger('moved_user');
            $table->timestamps();

            $table->foreign('card_id')->references('id')->on('cards')->onDelete('cascade');
            $table->foreign('previous_stage_id')->references('id')->on('stages')->onDelete('cascade');
            $table->foreign('new_stage_id')->references('id')->on('stages')->onDelete('cascade');
            $table->foreign('moved_user')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('card_movements');
    }
}