<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ProductFoodPackage extends Pivot
{
    protected $table = 'product_food_package';

    protected $fillable = [
        'product_id',
        'food_package_id',
        'AantalProductEenheden',
        'IsActief',
        'Opmerking',
        'DatumAangemaakt',
        'DatumGewijzigd'
    ];

    public $timestamps = false;
}
