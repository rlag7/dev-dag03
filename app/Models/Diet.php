<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Diet extends Model
{
    protected $fillable = ['Naam', 'Omschrijving', 'IsActief', 'Opmerking', 'DatumAangemaakt', 'DatumGewijzigd'];

    public function families()
    {
        return $this->belongsToMany(Family::class, 'diet_family')
            ->using(\App\Models\DietFamily::class);
    }

}
