<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('last_name')->nullable();
            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('gender')->nullable();
            $table->string('brith_date')->nullable();
            $table->foreignId('branch_id')->nullable()->constrained()->restrictOnDelete();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('pinfl')->nullable();
            $table->string('email')->nullable();
            $table->string('password')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
