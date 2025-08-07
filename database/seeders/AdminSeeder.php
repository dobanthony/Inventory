<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'first_name'    => 'Administrator',
            'middle_name'   => 'A',
            'last_name'     => 'Kala',
            'email'         => 'admin@gmail.com',
            'password'      => Hash::make('admin12345'), // You can change this
            'role'          => 'admin',
        ]);
    }
}
