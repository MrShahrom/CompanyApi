<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Sample Dummy Users Array
        $users = [
            [
                'name'=>'Admin',
                'email'=>'admin@gmail.com',
                'password'=> Hash::make('admin201')
            ],
            [
                'name'=>'technolog',
                'email'=>'technolog@gmail.com',
                'password'=> Hash::make('technolog202')
            ],
        ];

        // Looping and Inserting Array's Users into User Table
        foreach($users as $user){
            User::create($user);
        }
    }
}
