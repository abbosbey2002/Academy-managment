<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillingsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('billings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')
                ->nullable()
                ->constrained('students')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->string('account')->nullable();
            $table->decimal('amount', 15, 2)->nullable(); // Change to decimal for monetary values
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('billings', function (Blueprint $table) {
            $table->dropForeign(['student_register_id']);
            $table->dropColumn('student_register_id');
        });
    }
}
