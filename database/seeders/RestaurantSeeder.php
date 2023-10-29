<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Restaurant;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {

        $restaurants = [
            [
                'user_id' => 1, // ID utente associato
                'name' => 'Pizzeria da Peppe',
                'address' => 'Via Roma, 123, Milano',
                'piva' => '204060801000',
                'visible' => '1',
                'photo' => 'https://images.pexels.com/photos/1653702/pexels-photo-1653702.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
            ],
            [
                'user_id' => 1, // Cambia l'ID utente se necessario
                'name' => 'La Coyocana',
                'address' => 'Calle de la Rosa, 45, Città del Messico',
                'piva' => '120365987431',
                'visible' => '1',
                'photo' => 'https://images.pexels.com/photos/18463157/pexels-photo-18463157/free-photo-of-citta-auto-ristorante-punto-di-riferimento.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
            ],
            [
                'user_id' => 1, // Cambia l'ID utente se necessario
                'name' => 'Imasakiyaki',
                'address' => 'Tokyo Street, 789, Tokyo',
                'piva' => '023698741258',
                'visible' => '1',
                'photo' => 'https://images.pexels.com/photos/18176489/pexels-photo-18176489/free-photo-of-ristorante-neon-business-servizio.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
            ],
            [
                'user_id' => 1, // Cambia l'ID utente se necessario
                'name' => 'Grill House',
                'address' => ' Bourke street, 12, Melbourne',
                'piva' => '125478963201',
                'visible' => '1',
                'photo' => 'https://images.pexels.com/photos/1482803/pexels-photo-1482803.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
            ],
            [
                'user_id' => 1, // Cambia l'ID utente se necessario
                'name' => 'Warong Old China',
                'address' => 'Wuling Road, 456, Pechino',
                'piva' => '021569874123',
                'visible' => '1',
                'photo' => 'https://images.pexels.com/photos/17238470/pexels-photo-17238470/free-photo-of-citta-menu-uomo-in-piedi.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
            ],
        ];

        foreach ($restaurants as $restaurant) {
            Restaurant::create([
                "user_id" => $restaurant["user_id"],
                "name" => $restaurant["name"],
                "address" => $restaurant["address"],
                "piva" => $restaurant["piva"],
                "visible" => $restaurant["visible"],
                "photo" => $restaurant["photo"],
            ]);
        };
    }
}
