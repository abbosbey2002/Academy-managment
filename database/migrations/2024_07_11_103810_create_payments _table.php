<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('paycom_transaction_id', 25)->nullable();
            $table->bigInteger('paycom_time')->nullable();
            $table->string('paycom_time_datetime', 255)->nullable();
            $table->dateTime('create_time')->nullable();
            $table->dateTime('perform_time')->nullable();
            $table->string('cancel_time', 13)->nullable();
            $table->integer('amount')->nullable();
            $table->tinyInteger('state')->nullable();
            $table->tinyInteger('reason')->nullable();
            $table->text('receivers')->nullable();
            $table->unsignedBigInteger('order_id')->nullable();
            $table->string('perform_time_unix', 13)->nullable();
            $table->string('type', 13)->nullable();
            $table->string('casher', 13)->nullable();
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('groups_id')->nullable();

            // Adding foreign key constraint (assumes 'groups' table exists with 'id' column)
            $table->foreign('groups_id')->references('id')->on('groups')->onDelete('cascade');
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('payments', function (Blueprint $table) {
            // Dropping foreign key constraint
            $table->dropForeign(['groups_id']);
            
            // Dropping the `groups_id` column
            $table->dropColumn('groups_id');
        });
    }
}
