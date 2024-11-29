<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOperationsTable extends Migration
{
    public function up()
    {
        Schema::create('operations', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique(); // Операция nomi
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('operations');
    }
}
