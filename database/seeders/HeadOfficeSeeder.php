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
            "province"=> "JAWA BARAT",
            "city_or_regency"=> "KOTA CIMAHI",
            "district" => "CIMAHI TENGAH",
            "village"=> "CIGUGUR TENGAH",
            "rt_and_rw"=> 0204,
            "street_or_building_name" => "gg pelangi",
            "phone_number" => "83821391107"
        ]);
    }
}
