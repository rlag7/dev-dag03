<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class AllergyPerson extends Pivot
{
    protected $table = 'allergy_person';

    protected $fillable = [
        'allergy_id',
        'persoon_id',
        'IsActief',
        'Opmerking',
        'DatumAangemaakt',
        'DatumGewijzigd'
    ];

    public $timestamps = false;
}
