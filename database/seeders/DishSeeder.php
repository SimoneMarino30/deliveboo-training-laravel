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
            // ID 1
            [
                'restaurant_id' => 1, // ID del ristorante associato
                'name' => 'Margherita',
                'description' => 'An irresistible symphony of colors, shapes, and aromas harmoniously blend on the crispy round surface. A culinary masterpiece that captivates both palate and heart.',
                'ingredients' => 'Tomato, Mozzarella, Basil',
                'visible' => 1,
                'price' => 6.99,
            ],
            [
                'restaurant_id' => 1, // ID del ristorante associato
                'name' => 'Bufalina',
                'description' => 'A heavenly marriage of creamy buffalo mozzarella and a delicate dough, crowned with exquisite flavors. A gastronomic delight that will transport you to pizza paradise',
                'ingredients' => 'Tomato, Buffalo Mozzarella, Basil',
                'visible' => 1,
                'price' => 8.99,
            ],
            [
                'restaurant_id' => 1, // ID del ristorante associato
                'name' => 'Napoli',
                'description' => 'A symphony of flavors emerges from the combination of juicy San Marzano tomatoes, creamy Agerola fior di latte, and delicate anchovies. Napoli\'s culinary treasure, captured in every bite.',
                'ingredients' => 'Tomato, Provola affumicata di Agerola, Basil, Origano', 'Alici',
                'visible' => 1,
                'price' => 11.99,
            ],
            // ID MEXICAN 2
            [
                'restaurant_id' => 2,
                'name' => 'Burrito al Pastor',
                'description' => 'A traditional Mexican street burrito with marinated beef.',
                'ingredients' => 'Marinated beef, Rice, Onion, Cilantro',
                'visible' => 1,
                'price' => 3.50,
            ],
            [
                'restaurant_id' => 2,
                'name' => 'Tacos al Carbon',
                'description' => 'Delicious grilled meat tacos served with salsa.',
                'ingredients' => 'Grilled meat, Tortillas, Salsa',
                'visible' => 1,
                'price' => 4.00,
            ],
            [
                'restaurant_id' => 2,
                'name' => 'Enchiladas Verdes',
                'description' => 'Corn tortillas filled with chicken and covered with green salsa.',
                'ingredients' => 'Chicken, Corn tortillas, Green salsa',
                'visible' => 1,
                'price' => 5.00,
            ],
            [
                'restaurant_id' => 2,
                'name' => 'Chiles Rellenos',
                'description' => 'Poblano peppers stuffed with cheese and served with tomato sauce.',
                'ingredients' => 'Poblano peppers, Cheese, Tomato sauce',
                'visible' => 1,
                'price' => 6.00,
            ],
            [
                'restaurant_id' => 2,
                'name' => 'Pozole',
                'description' => 'Traditional soup made with hominy corn and meat, garnished with lettuce, chili peppers, radish, onion, lime and oregano.',
                'ingredients' => 'Hominy corn, Meat, Lettuce, Chili peppers, Radish, Onion, Lime, Oregano',
                'visible' => 1,
                'price' => 7.00,
            ],
            // ID 3
            [
                'restaurant_id' => 3,
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
