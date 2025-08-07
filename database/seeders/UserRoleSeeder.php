<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin12345'), // you can change this
            'role' => 'admin',
        ]);

        // Teacher
        User::create([
            'name' => 'Thomas Gender',
            'email' => 'thomas@gmail.com',
            'password' => Hash::make('thomas12345'), // you can change this
            'role' => 'teacher',
        ]);
    }
}
