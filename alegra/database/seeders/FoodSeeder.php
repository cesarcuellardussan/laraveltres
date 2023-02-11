<?php

namespace Database\Seeders;

use App\Models\Food;
use Illuminate\Database\Seeder;

class FoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $foods =  [
            ["name" => "CARNE A LA PARRILLA", "description" => "Carne cocida en parrilla o asador. Se marina y se cocina a fuego medio/alto.", "image_dir" => "/imagenes/carne-parrilla.jpg"],
            ["name" => "AJIACO", "description" => "sopa de papas y pollo hecha con una variedad de verduras, entre ellas tomate y cebolla, y especias", "image_dir" => "/imagenes/ajiaco.jpg"],
            ["name" => "ARROZ CON POLLO", "description" => "El arroz con pollo es un plato tradicional de varias culturas. Se compone de arroz cocido y pollo cocido, mezclados juntos con especias y verduras.", "image_dir" => "/imagenes/arroz-pollo.jpg"],
            ["name" => "AREPAS RELLENAS", "description" => "pan de maíz cocido al horno o a la parrilla, rellenado con carne asada y queso.", "image_dir" => "/imagenes/arepa.jpg"],
            ["name" => "BANDEJA PAISA", "description" => "plato típico de la región Andina de Colombia, que incluye arroz, frijoles, carne asada o chorizo, aguacate, chicharron, huevo frito y plátano maduro.", "image_dir" => "/imagenes/bandeja.jpg"],
            ["name" => "SANCOCHO", "description" => "Sopa espesa y picante hecha con verduras y carne de pollo, cerdo o res.", "image_dir" => "/imagenes/sancocho.jpg"],
        ];

        foreach ($foods as $food) {
            Food::create([
                'name'        => $food['name'],
                'description' => $food['description'],
                'image_dir'   => $food['image_dir']
            ]);
        }
    }
}
