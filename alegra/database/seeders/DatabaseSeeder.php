<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();
        $this->call(FoodSeeder::class);
        $this->call(IngredientSeeder::class);
        $this->call(RecipeSeeder::class);
        $this->call(StatusSeeder::class);
    }
}
