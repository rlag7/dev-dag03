<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FoodPackage extends Model
{
    public function family()
    {
        return $this->belongsTo(Family::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_food_package')
            ->using(\App\Models\ProductFoodPackage::class)
            ->withPivot('AantalProductEenheden');
    }

}

