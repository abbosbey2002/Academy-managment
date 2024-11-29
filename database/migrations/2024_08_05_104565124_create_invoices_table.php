<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id(); // Avto-inkremental primary key
            $table->string('account'); // account maydoni
            $table->unsignedBigInteger('group_id'); // group_id maydoni
            $table->decimal('amount', 15, 2); // amount maydoni
            $table->unsignedBigInteger('student_id')->nullable(); // student_id maydoni
            $table->enum('state', ['0', '1', '2'])->default('0');
            $table->timestamps(); // created_at va updated_at maydonlari

            // Foreign key constraints
            $table->foreign('group_id')
                  ->references('id')
                  ->on('groups')
                  ->onDelete('cascade'); // ON DELETE CASCADE

            $table->foreign('student_id')
                  ->references('id')
                  ->on('students')
                  ->onDelete('cascade'); // ON DELETE SET NULL
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('invoices', function (Blueprint $table) {
            // Drop foreign key constraints
            $table->dropForeign(['group_id']);
            $table->dropForeign(['student_id']);
        });

        Schema::dropIfExists('invoices');
    }
}


