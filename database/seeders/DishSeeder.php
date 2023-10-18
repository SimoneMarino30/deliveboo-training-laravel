<?php

namespace Database\Seeders;

use App\Models\Dish;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dishes = [
            [
                'restaurant_id' => 1, // ID del ristorante associato
                'name' => 'Pizza Margherita',
                'description' => 'A classic Italian pizza with tomato, mozzarella, and basil.',
                'ingredients' => 'Tomato, Mozzarella, Basil',
                'visible' => 1,
                'price' => 9.99,
            ],
            [
                'restaurant_id' => 2, // ID del ristorante associato
                'name' => 'Taco al Pastor',
                'description' => 'A traditional Mexican street taco with marinated pork.',
                'ingredients' => 'Marinated Pork, Pineapple, Onion, Cilantro',
                'visible' => 1,
                'price' => 3.50,
            ],
            [
                'restaurant_id' => 3, // ID del ristorante associato
                'name' => 'Sushi Roll',
                'description' => 'Fresh and delicious sushi roll with assorted seafood.',
                'ingredients' => 'Assorted Seafood, Rice, Seaweed',
                'visible' => 1,
                'price' => 12.99,
            ],
            [
                'restaurant_id' => 4, // ID del ristorante associato
                'name' => 'Croissant',
                'description' => 'A buttery and flaky French croissant for breakfast.',
                'ingredients' => 'Butter, Flour, Yeast',
                'visible' => 1,
                'price' => 2.50,
            ],
            [
                'restaurant_id' => 5, // ID del ristorante associato
                'name' => 'Kung Pao Chicken',
                'description' => 'Spicy and savory Chinese dish with chicken and peanuts.',
                'ingredients' => 'Chicken, Peanuts, Chili, Soy Sauce',
                'visible' => 1,
                'price' => 10.99,
            ],
        ];

        foreach ($dishes as $dish) {
            Dish::create([
                'restaurant_id' => $dish['restaurant_id'],
                'name' => $dish['name'],
                'description' => $dish['description'],
                'ingredients' => $dish['ingredients'],
                'visible' => $dish['visible'],
                'price' => $dish['price'],
            ]);
        }
    }
}
