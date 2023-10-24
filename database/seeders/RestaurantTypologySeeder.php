<?php

namespace Database\Seeders;

use App\Models\Restaurant;
use App\Models\Typology;

use Illuminate\Database\Seeder;

class RestaurantTypologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $restaurants = Restaurant::all();
        $typologies = Typology::all();

        // !RIVEDERE PLUCK
        // ->pluck('id')->toArray()

        foreach ($restaurants as $restaurant) {
            $restaurant
                ->typologies()
                ->attach($typologies->random(random_int(0, 3)));
        }
    }
}
