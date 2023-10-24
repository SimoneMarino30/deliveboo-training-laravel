<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'address', 'piva', 'photo'];

    // * RELAZIONI

    // Relazione con tabella users
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function dish()
    {
        return $this->hasMany(Dish::class);
    }

    public function typologies()
    {
        return $this->belongsToMany(Typology::class);
    }
}
