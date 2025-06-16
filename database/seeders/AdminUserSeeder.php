<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        User::updateOrCreate(
            ['email' => 'admin@gmail.com'], // duplicate এড়াতে কন্ডিশন
            [
                'name' => 'Admin User',
                'password' => Hash::make('12345678'), // পাসওয়ার্ড
                'is_admin' => true, // users টেবিলে এই কলাম থাকা দরকার
            ]
        );
    }
}
