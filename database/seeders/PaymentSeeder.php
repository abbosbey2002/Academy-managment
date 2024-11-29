<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Payment;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            Payment::create([
                'date' => now(),
                'name' => "Payment $i",
                'email' => "payment$i@example.com",
                'phone' => "+99890000000$i",
                'address' => "Address $i",
                'comment' => "Comment $i"
            ]);
        }
    }
}
