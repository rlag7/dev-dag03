<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductWarehouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('product_warehouse')->insert([
            ['id' => 1, 'product_id' => 1, 'warehouse_id' => 1, 'Locatie' => 'Berlicum', 'IsActief' => 1],
            ['id' => 2, 'product_id' => 2, 'warehouse_id' => 2, 'Locatie' => 'Rosmalen', 'IsActief' => 1],
            ['id' => 3, 'product_id' => 3, 'warehouse_id' => 3, 'Locatie' => 'Berlicum', 'IsActief' => 1],
            ['id' => 4, 'product_id' => 4, 'warehouse_id' => 4, 'Locatie' => 'Berlicum', 'IsActief' => 1],
            ['id' => 5, 'product_id' => 5, 'warehouse_id' => 5, 'Locatie' => 'Rosmalen', 'IsActief' => 1],
            ['id' => 6, 'product_id' => 6, 'warehouse_id' => 6, 'Locatie' => 'Berlicum', 'IsActief' => 1],
            ['id' => 7, 'product_id' => 7, 'warehouse_id' => 7, 'Locatie' => 'Rosmalen', 'IsActief' => 1],
            ['id' => 8, 'product_id' => 8, 'warehouse_id' => 8, 'Locatie' => 'Sint-MichelsGestel', 'IsActief' => 1],
            ['id' => 9, 'product_id' => 9, 'warehouse_id' => 9, 'Locatie' => 'Sint-MichelsGestel', 'IsActief' => 1],
            ['id' => 10, 'product_id' => 10, 'warehouse_id' => 10, 'Locatie' => 'Middelrode', 'IsActief' => 1],
            ['id' => 11, 'product_id' => 11, 'warehouse_id' => 11, 'Locatie' => 'Middelrode', 'IsActief' => 1],
            ['id' => 12, 'product_id' => 12, 'warehouse_id' => 12, 'Locatie' => 'Middelrode', 'IsActief' => 1],
            ['id' => 13, 'product_id' => 13, 'warehouse_id' => 13, 'Locatie' => 'Schijndel', 'IsActief' => 1],
            ['id' => 14, 'product_id' => 14, 'warehouse_id' => 14, 'Locatie' => 'Schijndel', 'IsActief' => 1],
            ['id' => 15, 'product_id' => 15, 'warehouse_id' => 15, 'Locatie' => 'Gemonde', 'IsActief' => 1],
            ['id' => 16, 'product_id' => 16, 'warehouse_id' => 16, 'Locatie' => 'Gemonde', 'IsActief' => 1],
            ['id' => 17, 'product_id' => 17, 'warehouse_id' => 17, 'Locatie' => 'Gemonde', 'IsActief' => 1],
            ['id' => 18, 'product_id' => 18, 'warehouse_id' => 18, 'Locatie' => 'Gemonde', 'IsActief' => 1],
            ['id' => 19, 'product_id' => 19, 'warehouse_id' => 19, 'Locatie' => 'Den Bosch', 'IsActief' => 1],
            ['id' => 20, 'product_id' => 20, 'warehouse_id' => 20, 'Locatie' => 'Den Bosch', 'IsActief' => 1],
            ['id' => 21, 'product_id' => 21, 'warehouse_id' => 21, 'Locatie' => 'Den Bosch', 'IsActief' => 1],
            ['id' => 22, 'product_id' => 22, 'warehouse_id' => 22, 'Locatie' => 'Heeswijk Dinther', 'IsActief' => 1],
            ['id' => 23, 'product_id' => 23, 'warehouse_id' => 23, 'Locatie' => 'Heeswijk Dinther', 'IsActief' => 1],
            ['id' => 24, 'product_id' => 24, 'warehouse_id' => 24, 'Locatie' => 'Heeswijk Dinther', 'IsActief' => 1],
            ['id' => 25, 'product_id' => 25, 'warehouse_id' => 25, 'Locatie' => 'Vught', 'IsActief' => 1],
            ['id' => 26, 'product_id' => 26, 'warehouse_id' => 26, 'Locatie' => 'Vught', 'IsActief' => 1],
            ['id' => 27, 'product_id' => 27, 'warehouse_id' => 27, 'Locatie' => 'Vught', 'IsActief' => 1],
            ['id' => 28, 'product_id' => 28, 'warehouse_id' => 28, 'Locatie' => 'Vught', 'IsActief' => 1],
            ['id' => 29, 'product_id' => 29, 'warehouse_id' => 29, 'Locatie' => 'Vught', 'IsActief' => 1],
        ]);

    }
}
