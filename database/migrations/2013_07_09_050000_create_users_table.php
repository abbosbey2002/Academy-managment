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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('branch_id'); // `after` metodini olib tashladik
            $table->string('first_name');
            $table->string('last_name');
            $table->date('brith_date')->nullable();
            $table->string('pinfl')->unique();
            $table->string('phone_number');
            $table->string('email')->unique();
            $table->string('password');
           
            $table->unsignedBigInteger('region_id')->nullable();
            $table->unsignedBigInteger('district_id')->nullable();
            $table->string('specialization')->nullable();
            $table->string('address')->nullable();
            $table->unsignedTinyInteger('role'); // 0 = Teacher, 1 = Admin
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('branch_id')
                  ->references('id')
                  ->on('branches')
                  ->onDelete('cascade');

            $table->foreign('region_id')
                  ->references('id')
                  ->on('regions')
                  ->onDelete('set null');

            $table->foreign('district_id')
                  ->references('id')
                  ->on('districts')
                  ->onDelete('set null');
        });
    }

    /**
    * Reverse the migrations.
    */
    public function down(): void
    {
        Schema::dropIfExists('users'); // to'g'ridan-to'g'ri `users` jadvalini tushirib yuboring
    }
};

