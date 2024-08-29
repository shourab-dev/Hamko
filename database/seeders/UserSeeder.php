<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //* DEMO USERS ARRAY
        $users = [
            [
                'name' => 'Hamko',
                'email' => 'hamko@gmail.com',
                'password' => Hash::make('password'),
            ]
        ];
        foreach ($users as $user) {
            User::create($user);
        }
    }
}
