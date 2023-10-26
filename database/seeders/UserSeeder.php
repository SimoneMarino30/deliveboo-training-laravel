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
        $user = new User();
        $user->name = 'Jimmy';
        $user->lastname = 'Test';
        $user->email = 'jimTest@ytest.com';
        $user->password = bcrypt('Jimmy1234567');
        $user->save();
    }
}
