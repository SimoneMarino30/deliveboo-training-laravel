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
                'name' => 'Ristorante Italiano',
                'address' => 'Via Roma, 123, Milano',
                'piva' => '204060801000',
                'visible' => '1',
                'photo' => 'url-dell-immagine-opzionale',
            ],
            [
                'user_id' => 1, // Cambia l'ID utente se necessario
                'name' => 'Ristorante Messicano',
                'address' => 'Calle de la Rosa, 45, Città del Messico',
                'piva' => '120365987431',
                'visible' => '1',
                'photo' => 'url-dell-immagine-opzionale',
            ],
            [
                'user_id' => 1, // Cambia l'ID utente se necessario
                'name' => 'Ristorante Giapponese',
                'address' => 'Tokyo Street, 789, Tokyo',
                'piva' => '023698741258',
                'visible' => '1',
                'photo' => 'url-dell-immagine-opzionale',
            ],
            [
                'user_id' => 1, // Cambia l'ID utente se necessario
                'name' => 'Ristorante Australiano',
                'address' => 'jhonny , 12, Fairfield',
                'piva' => '125478963201',
                'visible' => '1',
                'photo' => 'url-dell-immagine-opzionale',
            ],
            [
                'user_id' => 1, // Cambia l'ID utente se necessario
                'name' => 'Ristorante Cinese',
                'address' => 'Wuling Road, 456, Pechino',
                'piva' => '021569874123',
                'visible' => '1',
                'photo' => 'url-dell-immagine-opzionale',
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