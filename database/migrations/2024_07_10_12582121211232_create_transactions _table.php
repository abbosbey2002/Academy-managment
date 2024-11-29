<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('unical_id')->nullable();
            $table->unsignedBigInteger('student_id')->nullable();
            $table->unsignedBigInteger('group_id')->nullable(); // Add this line for group ID
            $table->unsignedBigInteger('invoice_id')->nullable(); // Qo'shing
            $table->date('date')->nullable();
            $table->decimal('amount', 10, 2)->nullable();
            $table->string('month')->nullable();
            $table->string('status')->nullable();

            $table->foreign('student_id')
                ->references('id')
                ->on('students')
                ->onDelete('cascade');

            $table->foreign('group_id') // Define the foreign key relationship for group_id
                ->references('id')
                ->on('groups') // Ensure this matches your 'groups' table name
                ->onDelete('set null'); // Set to null if the related group is deleted

            $table->foreign('invoice_id') // Define the foreign key relationship for invoice_id
                ->references('id')
                ->on('invoices')
                ->onDelete('set null'); // Qo'shing

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};

