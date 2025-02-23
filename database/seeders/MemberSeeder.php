<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Members;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Members::create(
            [
                'member_name' => 'John Doe',
                'birthday_date' => '1990-01-01',
                'address' => '123 Main St',
                'ktp' => 123456789,
                'kk' => 987654321,
                'member_picture' => 'john_doe.jpg',
                'member_ktp_picture' => 'john_doe_ktp.jpg',
                'member_hold_ktp_picture' => 'john_doe_hold_ktp.jpg',
                'business' => 'Tech Store',
                'business_address' => '456 Business St',
                'binding_letter' => 'Letter Content',
                'binding_letter_picture' => 'binding_letter.jpg',
                'phone_number' => 1234567890,
                'user_id' => 1,
                'detail_resort_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            // Tambahkan data anggota lain jika diperlukan
        ]);
    }
}
