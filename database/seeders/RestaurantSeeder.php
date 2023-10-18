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
                'piva' => '12345678901',
                'photo' => 'url-dell-immagine-opzionale',
            ],
            [
                'user_id' => 1, // Cambia l'ID utente se necessario
                'name' => 'Ristorante Messicano',
                'address' => 'Calle de la Rosa, 45, Città del Messico',
                'piva' => '98765432104',
                'photo' => 'url-dell-immagine-opzionale',
            ],
            [
                'user_id' => 1, // Cambia l'ID utente se necessario
                'name' => 'Ristorante Giapponese',
                'address' => 'Tokyo Street, 789, Tokyo',
                'piva' => '24681357903',
                'photo' => 'url-dell-immagine-opzionale',
            ],
            [
                'user_id' => 1, // Cambia l'ID utente se necessario
                'name' => 'Ristorante Australiano',
                'address' => 'jhonny , 12, Fairfield',
                'piva' => '13579246801',
                'photo' => 'url-dell-immagine-opzionale',
            ],
            [
                'user_id' => 1, // Cambia l'ID utente se necessario
                'name' => 'Ristorante Cinese',
                'address' => 'Wuling Road, 456, Pechino',
                'piva' => '80246791352',
                'photo' => 'url-dell-immagine-opzionale',
            ],
        ];

        foreach ($restaurants as $restaurant) {
            Restaurant::create([
                "user_id" => $restaurant["user_id"],
                "name" => $restaurant["name"],
                "address" => $restaurant["address"],
                "piva" => $restaurant["piva"],
                "photo" => $restaurant["photo"],
            ]);
        };
    }
}
