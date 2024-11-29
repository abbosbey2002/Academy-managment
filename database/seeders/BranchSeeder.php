<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Branch;
use App\Models\Region;
use App\Models\District;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Retrieve existing region and district IDs
        $regionIds = Region::pluck('id')->toArray();
        $districtIds = District::pluck('id')->toArray();

        // Create 10 sample branches
        for ($i = 1; $i <= 2; $i++) {
            Branch::create([
                'name' => "Branch $i",
                'region_id' => $regionIds[array_rand($regionIds)],
                'district_id' => $districtIds[array_rand($districtIds)],
                'phone' => "+99890000000$i",
                'date' => "2005-09-14",
                'status' => "active"
            ]);
        }
    }
}
