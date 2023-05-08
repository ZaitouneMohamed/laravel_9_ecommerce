<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => "admin",
            'email' => "admin@admin.com",
            'email_verified_at' => now(),
            'password' => Hash::make("password"),
        ])->assignRole('admin');
        User::create([
            'name' => "user",
            'email' => "user@user.com",
            'email_verified_at' => now(),
            'password' => Hash::make("password"),
        ])->assignRole('user');
    }
}
