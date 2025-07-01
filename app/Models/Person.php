<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{

    public $timestamps = false;

    protected $fillable = ['family_id', 'Voornaam', 'Tussenvoegsel', 'Achternaam', 'Geboortedatum', 'TypePersoon', 'IsVertegenwoordiger', 'IsActief', 'Opmerking', 'DatumAangemaakt', 'DatumGewijzigd'];

    public function allergies()
    {
        return $this->belongsToMany(Allergy::class, 'allergy_person', 'persoon_id', 'allergy_id')
            ->using(\App\Models\AllergyPerson::class);
    }

    public function family()
    {
        return $this->belongsTo(Family::class);
    }

}
