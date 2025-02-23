<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            ["role_name" => "ADMIN"],
            ["role_name" => "HEAD LEADERS"],
            ["role_name" => "COORDINATOR"],
            ["role_name" => "HEAD CASHIER"],
            ["role_name" => "HEAD RECAP"],
            ["role_name" => "MANAGER"],
            ["role_name" => "BRANCH CASHIER"],
            ["role_name" => "BRANCH RECAP"],
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }



    }
}
