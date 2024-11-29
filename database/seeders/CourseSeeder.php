<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 2; $i++) {
            Course::create([
                'course_name' => "Course $i",
                'duration' => rand(10, 100) ,
                'cost' => rand(100, 1000)
            ]);
        }
    }
}
