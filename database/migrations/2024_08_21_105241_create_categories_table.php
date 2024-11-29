<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique(); // Статья (kategoriya) nomi
            $table->unsignedBigInteger('folder_id')->nullable(); // Ustun nomi o'zgartirildi: folder_id
            $table->text('description')->nullable(); // Yangi ustun: description
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('folder_id')->references('id')->on('categories_folder')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropForeign(['folder_id']); // Foreign keyni olib tashlash uchun yangilandi
        });
        Schema::dropIfExists('categories');
    }
}
