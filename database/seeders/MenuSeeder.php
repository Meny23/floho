<?php

namespace Database\Seeders;

use App\Models\MenuType;
use App\Models\User;
use App\Models\UserMenu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $menu_types = [
            [
                "name" => "Catalogos",
                "icon" => "icon-7",
                "menus" => [
                    [
                        "name" => "Usuarios",
                        "link" => "/users"
                    ],
                    [
                        "name" => "Tipos de menu",
                        "link" => "/menu-types"
                    ],
                    [
                        "name" => "Menus",
                        "link" => "/menus"
                    ]
                ]
            ],
            [
                "name" => "Administracion",
                "icon" => null,
                "menus" => []
            ],
            [
                "name" => "Reportes",
                "icon" => null,
                "menus" => []
            ]
        ];

        // crear tipos de menu y sus menus
        collect($menu_types)->each(
            fn ($type) =>
            MenuType::create([
                "name" => $type["name"],
                "icon" => $type["icon"]
            ])
                ->menus()
                ->createMany(collect($type['menus'])->map(fn ($menu) => [
                    'name' => $menu['name'],
                    'link' => $menu['link']
                ])->toArray())
        );

        // asignar menus al usuario master
        User::find(1)->userMenus()->createMany([
            ["menu_id" => 1],
            ["menu_id" => 2],
            ["menu_id" => 3],
        ]);
    }
}
