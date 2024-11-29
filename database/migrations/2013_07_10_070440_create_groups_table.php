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
        Schema::create('groups', function (Blueprint $table) {
            $table->id();
            $table->foreignId('branch_id')->constrained()->cascadeOnDelete();
            $table->json('enrollment_id')->nullable();
            $table->foreignId('course_id')->constrained()->cascadeOnDelete();
            $table->unsignedBigInteger('teacher_id'); // Simply declare the column without 'after'
            $table->string('group_name')->nullable();
            $table->string('room')->nullable();
             $table->string('limit')->nullable();
            $table->json('days_of_week')->nullable(); // Add JSON column for days of week
            $table->time('start_time')->nullable(); // Add column for start time
            $table->time('end_time')->nullable();
            $table->foreign('teacher_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->enum('status', [
                'active',
                'paused',
                'completed',
                'recruiting',
                'cancelled'
            ])->default('recruiting');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('groups', function (Blueprint $table) {
            $table->dropColumn('days_of_week'); // Remove the days_of_week column
            $table->dropColumn('start_time'); // Remove the start_time column
            $table->dropColumn('end_time');
        });
    }
};
