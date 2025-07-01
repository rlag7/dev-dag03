<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    public function people()
    {
        return $this->hasMany(Person::class);
    }

    public function diets()
    {
        return $this->belongsToMany(Diet::class, 'diet_family')
            ->using(\App\Models\DietFamily::class);
    }

    public function contact()
    {
        return $this->belongsToMany(Contact::class, 'contact_family', 'family_id', 'contact_id');
    }


    public function representative()
    {
        return $this->hasMany(Person::class)->where('IsVertegenwoordiger', true);
    }


    public function foodPackages()
    {
        return $this->hasMany(FoodPackage::class);
    }
}
