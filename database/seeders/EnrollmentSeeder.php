<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Enrollment;
use App\Models\User;

class EnrollmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();

        foreach ($users as $user) {
            for ($i = 1; $i <= 1; $i++) {
                Enrollment::create([
                    'user_id' => $user->id,
                    'date' => now(),
                    'status' => 'active'
                ]);
            }
        }
    }
}
