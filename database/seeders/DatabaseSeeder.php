<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RegionSeeder::class,
            DistrictSeeder::class,
            BranchSeeder::class,
            UserSeeder::class,
            // CourseSeeder::class,
            // EnrollmentSeeder::class,
          
            // GroupSeeder::class,
        ]);
    }
}
