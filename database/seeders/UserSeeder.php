<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Branch;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $branches = Branch::all();
        User::create([
            'branch_id' => 1,
            'first_name' => 'Admin',
            'last_name' => 'Adminov',
            'email' => "dora@dora.uz",
            'password' => Hash::make('dora@dora.uz'),
            'phone_number' => "+998919579717",
            'address' => 'Maymanoq',
            'role' => 0,
            'pinfl' => '12345678901234' // Unique pinfl qiymatini qo'shing
        ]);
        User::create([
            'branch_id' => 1,
            'first_name' => 'Dora Uz',
            'last_name' => 'Asosiy',
            'email' => "info@dora.uz",
            'password' => Hash::make('515_dOR@'),
            'phone_number' => "+998 91 073 93 73",
            'address' => 'Toshkent sh',
            'role' => 0,
            'pinfl' => '23456789012345' // Unique pinfl qiymatini qo'shing
        ]);
    }
}

