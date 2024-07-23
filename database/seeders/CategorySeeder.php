<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ["name" => "Alcatraces", "description" => "Los alcatraces representan la pureza y la compasión. Es por ello que son el complemento ideal para el ramo de la novia. Si quieres transmitir elegancia y pureza, regala un bouquet de Alcatraces. ¡Las flores perfectas! ¡Tu mejor opción!"],
            ["name" => "Arreglos Florales", "description" => "Los arreglos florales de Premium Florist son el obsequio perfecto para cada ocasión especial. Sin importar el motivo tenemos una variedad que se ajusta perfecto a lo que quieres expresar. ¿Qué esperas? ¡Envia flores y genera sonrisas ya!"],
            ["name" => "Exóticos & Diseño", "description" => "En Premium Florist sabemos que eres original, que no te conformas y a la hora de expresarte lo más importante es dejar huella. Envía nuestros arreglos florales Exóticos y de Diseño, son tan únicos como tú. ¿Qué esperas? ¡Regala un gran momento inolvidable!"],
        ];

        collect($categories)->each(fn ($category) => Category::updateOrCreate(
            [
                "name" => $category["name"]
            ],
            [
                "description" => $category["description"]
            ]
        ));
    }
}
