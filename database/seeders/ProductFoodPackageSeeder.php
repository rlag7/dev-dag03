<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductFoodPackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('product_food_package')->insert([
            ['id' => 1, 'food_package_id' => 1, 'product_id' => 7, 'AantalProductEenheden' => 1, 'IsActief' => 1],
            ['id' => 2, 'food_package_id' => 1, 'product_id' => 8, 'AantalProductEenheden' => 2, 'IsActief' => 1],
            ['id' => 3, 'food_package_id' => 1, 'product_id' => 9, 'AantalProductEenheden' => 1, 'IsActief' => 1],
            ['id' => 4, 'food_package_id' => 2, 'product_id' => 12, 'AantalProductEenheden' => 1, 'IsActief' => 1],
            ['id' => 5, 'food_package_id' => 2, 'product_id' => 13, 'AantalProductEenheden' => 2, 'IsActief' => 1],
            ['id' => 6, 'food_package_id' => 2, 'product_id' => 14, 'AantalProductEenheden' => 1, 'IsActief' => 1],
            ['id' => 7, 'food_package_id' => 3, 'product_id' => 3, 'AantalProductEenheden' => 1, 'IsActief' => 1],
            ['id' => 8, 'food_package_id' => 3, 'product_id' => 4, 'AantalProductEenheden' => 1, 'IsActief' => 1],
            ['id' => 9, 'food_package_id' => 4, 'product_id' => 20, 'AantalProductEenheden' => 1, 'IsActief' => 1],
            ['id' => 10, 'food_package_id' => 4, 'product_id' => 19, 'AantalProductEenheden' => 1, 'IsActief' => 1],
            ['id' => 11, 'food_package_id' => 4, 'product_id' => 21, 'AantalProductEenheden' => 1, 'IsActief' => 1],
            ['id' => 12, 'food_package_id' => 5, 'product_id' => 24, 'AantalProductEenheden' => 1, 'IsActief' => 1],
            ['id' => 13, 'food_package_id' => 5, 'product_id' => 25, 'AantalProductEenheden' => 1, 'IsActief' => 1],
            ['id' => 14, 'food_package_id' => 5, 'product_id' => 26, 'AantalProductEenheden' => 1, 'IsActief' => 1],
            ['id' => 15, 'food_package_id' => 6, 'product_id' => 26, 'AantalProductEenheden' => 1, 'IsActief' => 1],
        ]);

    }
}
