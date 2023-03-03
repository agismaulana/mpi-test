<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                "name" => 'Administrator',
                "email" => 'admin@mpi.com',
                "email_verified_at" => now(),
                'password' => bcrypt('admin123'),
                'role' => 'administrator',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                "name" => 'User 1',
                "email" => 'user1@mpi.com',
                "email_verified_at" => now(),
                'password' => bcrypt('user123'),
                'role' => 'user',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                "name" => 'User 2',
                "email" => 'user2@mpi.com',
                "email_verified_at" => now(),
                'password' => bcrypt('user123'),
                'role' => 'user',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                "name" => 'User 3',
                "email" => 'user3@mpi.com',
                "email_verified_at" => now(),
                'password' => bcrypt('user123'),
                'role' => 'user',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];

        User::insert($data);
    }
}
