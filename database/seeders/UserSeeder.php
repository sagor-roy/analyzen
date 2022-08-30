<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(
            [
                'role' => 'admin',
                'link' => 'https://google.com',
                'phone' => '0140xxxxxx',
                'name' => 'Admin',
                'status' => 1,
                'email' => 'admin@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('000000'),
                'remember_token' => Str::random(10),
            ]
        );

        User::create(
            [
                'role' => 'user',
                'phone' => '0140xxxxxx',
                'link' => 'https://google.com',
                'name' => 'user',
                'status' => 1,
                'email' => 'user@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('000000'),
                'remember_token' => Str::random(10),
            ]
        );
    }
}
