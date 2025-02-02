<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\HeadOffice;

class HeadOfficeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        HeadOffice::create([
            "province"=> "jawa barat",
            "city_or_regency"=> "cimahi",
            "district" => "cimahi tengah",
            "village"=> "cigugur tengah",
            "rt_and_rw"=> 0204,
            "street_or_building_name" => "gg pelangi",
            "phone_number" => "83821391107"
        ]);
    }
}
