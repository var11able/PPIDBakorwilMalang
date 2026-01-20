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
        User::create([
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'firstName' => 'Admin',
            'lastName' => 'Bakorwil',
            'address' => 'ditempat',
            'role' => 'admin',
        ]);

        User::create([
            'email' => 'ahmad@gmail.com',
            'password' => Hash::make('password'),
            'firstName' => 'Staff',
            'lastName' => 'Ahmad',
            'address' => 'Kereta Bigmo',
            'role' => 'staff',
        ]);

        User::create([
            'email' => 'karinapark@gmail.com',
            'password' => Hash::make('123'),
            'firstName' => 'Karina',
            'lastName' => 'Park',
            'address' => 'Jl. Ijen No. 77, Malang'
        ]);
    }
}
