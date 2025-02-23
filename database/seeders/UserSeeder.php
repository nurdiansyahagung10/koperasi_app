<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void                                       
    {
        User::create([
            'user_name' => 'Admin',
            'email' => 'admin@gmail.com',
            'basic_salary' => 10000000,
            'salary_date' => 02,
            'hometown' => 'Jakarta',
            'phone_number' => '081234567890',
            'sk' => 'SK001',
            'password' => Hash::make('admin123'),
            'role_id' => 1,
            'branch_id' => null,
            'head_id' => null,
        ]);
    }
}
