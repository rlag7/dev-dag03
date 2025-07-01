<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ContactSupplier extends Pivot
{
    protected $table = 'contact_supplier';

    protected $fillable = [
        'contact_id',
        'supplier_id',
        'IsActief',
        'Opmerking',
        'DatumAangemaakt',
        'DatumGewijzigd'
    ];

    public $timestamps = false;
}
