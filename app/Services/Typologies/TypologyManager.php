<?php

namespace App\Services\Typologies;

use Illuminate\Support\Facades\Validator;

class TypologyManager
{
  public static function validationTypology($data)
  {
    $validatorTypology = Validator::make(
      $data,
      [
        'name' => 'required|string|max:100',
      ],
      [
        'name.required' => 'il nome è obbligatorio',
        'name.max' => 'il nome deve avere al massimo 100 catteri',
        'name.string' => 'il titolo deve essere una stringa',
      ]
    )->validate();

    return $validatorTypology;
  }
}
