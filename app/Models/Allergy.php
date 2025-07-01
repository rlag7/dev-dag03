<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Allergy extends Model
{

    public $timestamps = true;

    const CREATED_AT = 'DatumAangemaakt';
    const UPDATED_AT = 'DatumGewijzigd';

    protected $fillable = ['Naam', 'Omschrijving', 'AnafylactischRisico', 'IsActief', 'Opmerking', 'DatumAangemaakt', 'DatumGewijzigd'];

    public function people()
    {
        return $this->belongsToMany(Person::class, 'allergy_person', 'allergy_id', 'person_id')
            ->using(\App\Models\AllergyPerson::class);
    }

}

