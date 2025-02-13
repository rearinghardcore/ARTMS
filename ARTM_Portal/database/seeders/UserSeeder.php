<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin User',
            'student_id' => 1,
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'usertype' => 'admin',
        ]);

        User::create([
            'name' => 'Student User',
            'student_id' => 12345678,
            'email' => 'student@example.com',
            'password' => Hash::make('password'),
            'usertype' => 'student',
        ]);

        User::create([
            'name' => 'Super Admin',
            'student_id' => 0,
            'email' => 'superadmin@example.com',
            'password' => Hash::make('password'),
            'usertype' => 'superadmin',
        ]);


        // Add more users as needed
    }
}