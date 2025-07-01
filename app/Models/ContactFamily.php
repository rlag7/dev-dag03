<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ContactFamily extends Pivot
{
    protected $table = 'contact_family';

    protected $fillable = [
        'contact_id',
        'family_id',
        'IsActief',
        'Opmerking',
        'DatumAangemaakt',
        'DatumGewijzigd'
    ];

    public $timestamps = false;
}
