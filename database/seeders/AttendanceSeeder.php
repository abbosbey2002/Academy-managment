<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Attendance;
use App\Models\Group;

class AttendanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Fetch all groups with enrollments
        $groups = Group::with('enrollments')->get();

        // Ensure data availability
        if ($groups->isEmpty()) {
            return;
        }

        // Seed attendance records
        foreach ($groups as $group) {
            $enrolledUsers = $group->enrollments;

            foreach ($enrolledUsers as $user) {
                Attendance::create([
                    'student_id' => $user->id,
                    'group_id' => $group->id,
                    'date' => now()->format('Y-m-d'), // Current date
                    'status' => rand(0, 1) ? 'present' : 'absent', // Randomly assign present or absent status
                ]);
            }
        }
    }
}

