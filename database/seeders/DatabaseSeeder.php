<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AllergySeeder::class,
            CategorySeeder::class,
            ContactSeeder::class,
            FamilySeeder::class,
            SupplierSeeder::class,
            FoodPackageSeeder::class,
            PersonSeeder::class,
            UserSeeder::class,
            ProductSeeder::class,
            WarehouseSeeder::class,
            AllergyPersonSeeder::class,
            ContactFamilySeeder::class,
            ContactSupplierSeeder::class,
            DietSeeder::class,
            DietFamilySeeder::class,
            ProductFoodPackageSeeder::class,
            ProductSupplierSeeder::class,
            ProductWarehouseSeeder::class,

        ]);
    }
}
