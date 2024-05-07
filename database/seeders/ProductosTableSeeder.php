<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ProductosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $productos = [
            ['nombre' => 'Pan de trigo', 'alérgenos' => 'gluten'],
            ['nombre' => 'Barra de chocolate', 'alérgenos' => 'lácteos'],
            ['nombre' => 'Galletas de avena', 'alérgenos' => 'gluten'],
            ['nombre' => 'Camarones al ajillo', 'alérgenos' => 'crustáceos'],
            ['nombre' => 'Pasta con almejas', 'alérgenos' => 'moluscos'],
            ['nombre' => 'Crema de cacahuete', 'alérgenos' => 'cacahuetes'],
            ['nombre' => 'Salsa de soja', 'alérgenos' => 'soja'],
            ['nombre' => 'Nueces mixtas', 'alérgenos' => 'frutos secos'],
            ['nombre' => 'Mostaza', 'alérgenos' => 'mostaza'],
            ['nombre' => 'Tofu', 'alérgenos' => 'soja']
        ];

        foreach ($productos as $producto) {
            DB::table('productos')->insert([
                'nombre' => $producto['nombre'],
                'alérgenos' => $producto['alérgenos'],
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
