<?php

namespace Database\Seeders;

use App\Models\Recipe;
use Illuminate\Database\Seeder;

class RecipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $recipes =  [
            ["food_id" => 1, "ingredient_id" => 9,  "quantity" => 2],
            ["food_id" => 1, "ingredient_id" => 3,  "quantity" => 2],
            ["food_id" => 1, "ingredient_id" => 5,  "quantity" => 1],

            ["food_id" => 2, "ingredient_id" => 10, "quantity" => 2],
            ["food_id" => 2, "ingredient_id" => 3,  "quantity" => 2],
            ["food_id" => 2, "ingredient_id" => 7,  "quantity" => 1],

            ["food_id" => 3, "ingredient_id" => 4,  "quantity" => 3],
            ["food_id" => 3, "ingredient_id" => 10, "quantity" => 2],
            ["food_id" => 3, "ingredient_id" => 1,  "quantity" => 1],
            ["food_id" => 3, "ingredient_id" => 5,  "quantity" => 1],
            ["food_id" => 3, "ingredient_id" => 7,  "quantity" => 1],

            ["food_id" => 4, "ingredient_id" => 8,  "quantity" => 2],
            ["food_id" => 4, "ingredient_id" => 9,  "quantity" => 2],
            ["food_id" => 4, "ingredient_id" => 6,  "quantity" => 1],
            ["food_id" => 4, "ingredient_id" => 5,  "quantity" => 1],

            ["food_id" => 5, "ingredient_id" => 4,  "quantity" => 2],
            ["food_id" => 5, "ingredient_id" => 9,  "quantity" => 2],
            ["food_id" => 5, "ingredient_id" => 3,  "quantity" => 1],
            ["food_id" => 5, "ingredient_id" => 2,  "quantity" => 1],
            ["food_id" => 5, "ingredient_id" => 6,  "quantity" => 1],
            ["food_id" => 5, "ingredient_id" => 1,  "quantity" => 1],

            ["food_id" => 6, "ingredient_id" => 9,  "quantity" => 1],
            ["food_id" => 6, "ingredient_id" => 10, "quantity" => 1],
            ["food_id" => 6, "ingredient_id" => 3,  "quantity" => 1],
            ["food_id" => 6, "ingredient_id" => 1,  "quantity" => 1],
            ["food_id" => 6, "ingredient_id" => 7,  "quantity" => 1]
        ];


        foreach ($recipes as $recipe) {
            Recipe::create([
                'food_id'       => $recipe['food_id'],
                'ingredient_id' => $recipe['ingredient_id'],
                'quantity'      => $recipe['quantity']
            ]);
        }
    }
}
