<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesFolderTable extends Migration
{
    public function up()
    {
        Schema::create('categories_folder', function (Blueprint $table) {
            $table->id();
            $table->string('folder_name')->unique(); // Folder nomi
            $table->text('description')->nullable(); // Yangi ustun: description
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('categories_folder');
    }
}
