<?php

namespace Database\Seeders;

use App\Models\Typology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
            ],
            [
                'name' => 'Mexican',
            ],
            [
                'name' => 'Japanese',
            ],
            [
                'name' => 'French',
            ],
            [
                'name' => 'Chinese',
            ],
        ];

        foreach ($typologies as $typology) {
            Typology::create([
                "name" => $typology["name"],
            ]);
        };
    }
}
