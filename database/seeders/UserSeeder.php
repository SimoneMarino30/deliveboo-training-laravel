<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
                'name' => 'Jimmy',
                'lastname' => 'User',
                'email' => 'jimmtbest@yahoo.com',
                'password' => 'Jimmy1234567'
            ],
            [
                'name' => 'James',
                'lastname' => 'Nothing',
                'email' => 'james@yahoo.com',
                'password' => 'James1234567'
            ]
        ];

        foreach ($users as $user) {
            User::create([
                "name" => $user["name"],
                "lastname" => $user["lastname"],
                "email" => $user["email"],
                "password" => $user["password"],
            ]);
        };
    }
}
