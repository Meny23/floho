<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            "name" => "Manuel",
            "surname" => "Barreras",
            "second_surname" => "Soto",
            "email" => "mbarreras.s@hotmail.com",
            "password" => Hash::make("floho123"),
            "role_id" => 1
        ]);
    }
}
