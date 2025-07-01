<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function category()
    {
        return $this->belongsTo(Category::class, 'categorie_id');
    }

    public function suppliers()
    {
        return $this->belongsToMany(Supplier::class, 'product_supplier')
            ->using(\App\Models\ProductSupplier::class)
            ->withPivot('DatumAangeleverd', 'DatumEerstVolgendeLevering');
    }

    public function warehouses()
    {
        return $this->belongsToMany(Warehouse::class, 'product_warehouse')
            ->using(\App\Models\ProductWarehouse::class)
            ->withPivot('Locatie');
    }

    public function foodPackages()
    {
        return $this->belongsToMany(FoodPackage::class, 'product_food_package')
            ->using(\App\Models\ProductFoodPackage::class)
            ->withPivot('AantalProductEenheden');
    }

}
