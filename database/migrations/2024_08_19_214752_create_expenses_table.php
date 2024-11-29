<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpensesTable extends Migration
{
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('operation_id'); // Операция tanlash uchun
            $table->unsignedBigInteger('category_id'); // Статья (kategoriya) tanlash uchun
            $table->decimal('amount', 15, 2); // Xarajat miqdori
            $table->string('currency')->default('UZS'); // Valyuta
            $table->date('expense_date'); // Xarajat sanasi
            $table->text('comment')->nullable(); // Qo'shimcha izohlar
            $table->timestamps();

            // Foreign keys
            $table->foreign('operation_id')->references('id')->on('operations')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('expenses');
    }
}
