<?php

namespace Database\Seeders;

use App\Models\Typology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $typologies = [
            [
                'name' => 'Italian',
                'icon' => 'fi fi-it'
            ],
            [
                'name' => 'Mexican',
                'icon' => 'fi fi-mx'
            ],
            [
                'name' => 'Japanese',
                'icon' => 'fi fi-jp'
            ],
            [
                'name' => 'French',
                'icon' => 'fi fi-fr'
            ],
            [
                'name' => 'Chinese',
                'icon' => 'fi fi-cn'
            ],
            [
                'name' => 'Argentinian',
                'icon' => 'fi fi-ar'
            ],
            [
                'name' => 'Australian',
                'icon' => 'fi fi-au'
            ],
            [
                'name' => 'Brazilian',
                'icon' => 'fi fi-br'
            ],
            [
                'name' => 'Cambodian',
                'icon' => 'fi fi-kh'
            ],
            [
                'name' => 'Thai',
                'icon' => 'fi fi-th'
            ],

        ];

        foreach ($typologies as $typology) {
            Typology::create([
                "name" => $typology["name"],
                "icon" => $typology["icon"],
            ]);
        };
    }
}
