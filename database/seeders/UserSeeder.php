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
        $users = [
            [
                'id'             => 1,
                'name'           => 'Admin',
                'username'       => 'admin',
                'email'          => 'admin@mail.com',
                'password'       => bcrypt('password'),
                'remember_token' => null,
            ],
            [
                'id'             => 2,
                'name'           => 'Kasir',
                'username'       => 'kasir',
                'email'          => 'kasir@mail.com',
                'password'       => bcrypt('password'),
                'remember_token' => null,
            ],
            [
                'id'             => 3,
                'name'           => 'Siswa',
                'username'       => 'siswa',
                'email'          => 'siswa@mail.com',
                'password'       => bcrypt('password'),
                'remember_token' => null,
            ]
        ];

        User::insert($users);
    }
}
