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

    public function contacts()
    {
        return $this->belongsToMany(Contact::class, 'contact_family')
            ->using(\App\Models\ContactFamily::class);
    }


    public function foodPackages()
    {
        return $this->hasMany(FoodPackage::class);
    }
}
