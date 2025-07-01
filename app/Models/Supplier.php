<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = ['Naam', 'ContactPersoon', 'LeverancierNummer', 'LeverancierType', 'IsActief', 'Opmerking', 'DatumAangemaakt', 'DatumGewijzigd'];

    public function contacts()
    {
        return $this->belongsToMany(Contact::class, 'contact_supplier')
            ->using(\App\Models\ContactSupplier::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_supplier')
            ->using(\App\Models\ProductSupplier::class)
            ->withPivot('DatumAangeleverd', 'DatumEerstVolgendeLevering');
    }

}
