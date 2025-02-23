<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DetailResort;

class DetailResortSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DetailResort::create(
            [
                "day_code" => "A",
                "resort_id" => "39"
            ]
        );
    }
}
