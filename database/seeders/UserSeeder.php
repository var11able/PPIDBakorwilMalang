<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'password' => Hash::make('password'),
                'fullName' => 'Admin Bakorwil',
                'role' => 'admin',
            ]
        );

        User::firstOrCreate(
            ['email' => 'ahmad@gmail.com'],
            [
                'password' => Hash::make('password'),
                'fullName' => 'Staff Intern',
                'role' => 'staff',
            ]
        );

        User::firstOrCreate(
            ['email' => 'karinapark@gmail.com'],
            [
                'password' => Hash::make('123'),
                'fullName' => 'Yu Jimin',
            ]
        );

        User::factory(20)->create();
    }
}
