<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    protected $fillable = ['Ontvangstdatum', 'Uitleveringsdatum', 'VerpakkingsEenheid', 'Aantal', 'IsActief', 'Opmerking', 'DatumAangemaakt', 'DatumGewijzigd'];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_warehouse')
            ->using(\App\Models\ProductWarehouse::class)
            ->withPivot('Locatie');
    }

}
