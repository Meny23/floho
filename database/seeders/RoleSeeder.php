<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            ["name" => "administrador", "description" => "Rol de administrador"]
        ];

        collect($roles)->each(fn ($role) => Role::updateOrCreate([
            "name" => $role["name"],
            "description" => $role["description"]
        ]));
    }
}
