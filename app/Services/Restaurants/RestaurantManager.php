<?php

namespace App\Services\Restaurants;

use Illuminate\Support\Facades\Validator;

class RestaurantManager
{
  public static function validationRestaurant($data)
  {
    $validatorRestaurant = Validator::make(
      $data,
      [
        'name' => 'required|string|max:100',
        'address' => 'required|string|max:100',
        'piva' => 'required|string|max:12',
        'photo' => 'nullable|url',
        'typologies' => 'nullable|exists:typologies,id',
      ],
      [
        'name.required' => 'il nome è obbligatorio',
        'name.max' => 'il nome deve avere al massimo 100 catteri',
        'name.string' => 'il titolo deve essere una stringa',

        'address.required' => 'l\' indirizzo è obbligatorio',
        'address.max' => 'l\' album deve avere al massimo 255 catteri',
        'address.string' => 'l\' album deve essere una stringa',

        'piva.required' => 'la partita IVA è obbligatoria',
        'piva.max' => 'la partita IVA  deve avere al massimo 12 catteri',
        'piva.string' => 'la partita IVA deve essere una stringa numerica',

        'photo.url' => 'la foto deve essere caricata tramite un URL valido',

        'typologies.exists' => 'Le tipologie selezionate non sono valide',

      ]
    )->validate();

    return $validatorRestaurant;
  }
}