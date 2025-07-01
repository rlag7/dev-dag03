<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = ['Straat', 'Huisnummer', 'Toevoeging', 'Postcode', 'Woonplaats', 'Email', 'Mobiel', 'IsActief', 'Opmerking', 'DatumAangemaakt', 'DatumGewijzigd'];

    public function families()
    {
        return $this->belongsToMany(Family::class, 'contact_family')
            ->using(\App\Models\ContactFamily::class);
    }

    public function suppliers()
    {
        return $this->belongsToMany(Supplier::class, 'contact_supplier')
            ->using(\App\Models\ContactSupplier::class);
    }

}

