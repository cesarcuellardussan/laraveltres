<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use Illuminate\Database\Seeder;

class IngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $ingredients =  [
            ["name" => "TOMATE", "code" => "tomato" , "image_dir" => "/imagenes/tomate.jpg"],
            ["name" => "LIMON", "code" => "lemon" , "image_dir" => "/imagenes/limon.jpg"],
            ["name" => "PAPA", "code" => "potato" , "image_dir" => "/imagenes/papa.jpg"],
            ["name" => "ARROZ", "code" => "rice" , "image_dir" => "/imagenes/arroz.jpg"],
            ["name" => "SALSA DE TOMATE", "code" => "ketchup" , "image_dir" => "/imagenes/ketchu.jpg"],
            ["name" => "LECHUGA", "code" => "lettuce" , "image_dir" => "/imagenes/lechuga.jpg"],
            ["name" => "CEBOLLA", "code" => "onion" , "image_dir" => "/imagenes/cebolla.jpg"],
            ["name" => "QUESO", "code" => "cheese" , "image_dir" => "/imagenes/queso.jpg"],
            ["name" => "CARNE", "code" => "meat" , "image_dir" => "/imagenes/carne.jpg"],
            ["name" => "POLLO", "code" => "chicken" , "image_dir" => "/imagenes/pollo.jpg"]
        ];


        foreach ($ingredients as $ingredient) {
            Ingredient::create([
                'name'      => $ingredient['name'],
                'code'      => $ingredient['code'],
                'image_dir' => $ingredient['image_dir']
            ]);
        }
    }
}
