<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['Naam', 'Omschrijving', 'IsActief', 'Opmerking', 'DatumAangemaakt', 'DatumGewijzigd'];

    public function products()
    {
        return $this->hasMany(Product::class, 'categorie_id');
    }
}

