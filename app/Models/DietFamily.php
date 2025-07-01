<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class DietFamily extends Pivot
{
    protected $table = 'diet_family';

    protected $fillable = [
        'diet_id',
        'family_id',
        'IsActief',
        'Opmerking',
        'DatumAangemaakt',
        'DatumGewijzigd'
    ];

    public $timestamps = false;
}
