<?php

namespace App\Services\Dishes;

use Illuminate\Support\Facades\Validator;

class DishesManager
{
  // VALIDATION DISHES
  public static function validationDishes($data)
  {
    $validatorDishes = Validator::make(
      $data,
      [
        'name' => 'required|string|max:100',
        'description' => 'required|string|max:255',
        'ingredients' => 'string|max:100',
        'price' => "required|numeric|max:9999.99",
      ],
      [
        'name.required' => 'il nome è obbligatorio',
        'name.string' => 'il nome deve essere una stringa',
        'name.max' => 'il nome deve avere al massimo 100 catteri',

        'description.required' => 'La descrizione è obbligatoria',
        'description.string' => 'La descrizione deve essere una stringa',
        'description.max' => 'La descrizione deve avere al massimo 255 catteri',

        'ingredients.string' => 'Gli ingredienti devono essere una stringa',
        'ingredients.max' => 'La descrizione deve avere al massimo 100 catteri',

        'price.required' => 'Il prezzo è obbligatorio',
        'price.numeric' => 'il prezzo deve essere un numero',
        'price.max' => 'il prezzo deve non può superare 9999.99',

      ]
    )->validate();

    return $validatorDishes;
  }
}
