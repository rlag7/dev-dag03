<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('product_supplier')->insert([
            ['id' => 1, 'supplier_id' => 4, 'product_id' => 1, 'DatumAangeleverd' => '2024-04-12', 'DatumEerstVolgendeLevering' => '2024-05-12', 'IsActief' => 1],
            ['id' => 2, 'supplier_id' => 4, 'product_id' => 2, 'DatumAangeleverd' => '2024-03-02', 'DatumEerstVolgendeLevering' => '2024-04-02', 'IsActief' => 1],
            ['id' => 3, 'supplier_id' => 2, 'product_id' => 3, 'DatumAangeleverd' => '2024-07-16', 'DatumEerstVolgendeLevering' => '2024-08-16', 'IsActief' => 1],
            ['id' => 4, 'supplier_id' => 1, 'product_id' => 4, 'DatumAangeleverd' => '2024-02-12', 'DatumEerstVolgendeLevering' => '2024-03-12', 'IsActief' => 1],
            ['id' => 5, 'supplier_id' => 4, 'product_id' => 5, 'DatumAangeleverd' => '2024-05-19', 'DatumEerstVolgendeLevering' => '2024-06-19', 'IsActief' => 1],
            ['id' => 6, 'supplier_id' => 1, 'product_id' => 6, 'DatumAangeleverd' => '2024-06-23', 'DatumEerstVolgendeLevering' => '2024-07-23', 'IsActief' => 1],
            ['id' => 7, 'supplier_id' => 4, 'product_id' => 7, 'DatumAangeleverd' => '2024-06-20', 'DatumEerstVolgendeLevering' => '2024-07-20', 'IsActief' => 1],
            ['id' => 8, 'supplier_id' => 4, 'product_id' => 8, 'DatumAangeleverd' => '2024-05-02', 'DatumEerstVolgendeLevering' => '2024-06-02', 'IsActief' => 1],
            ['id' => 9, 'supplier_id' => 4, 'product_id' => 9, 'DatumAangeleverd' => '2022-12-04', 'DatumEerstVolgendeLevering' => '2024-01-04', 'IsActief' => 1],
            ['id' => 10, 'supplier_id' => 3, 'product_id' => 10, 'DatumAangeleverd' => '2024-03-07', 'DatumEerstVolgendeLevering' => '2024-04-07', 'IsActief' => 1],
            ['id' => 11, 'supplier_id' => 3, 'product_id' => 11, 'DatumAangeleverd' => '2024-02-04', 'DatumEerstVolgendeLevering' => '2024-03-04', 'IsActief' => 1],
            ['id' => 12, 'supplier_id' => 3, 'product_id' => 12, 'DatumAangeleverd' => '2024-02-28', 'DatumEerstVolgendeLevering' => '2024-03-28', 'IsActief' => 1],
            ['id' => 13, 'supplier_id' => 3, 'product_id' => 13, 'DatumAangeleverd' => '2024-03-19', 'DatumEerstVolgendeLevering' => '2024-04-19', 'IsActief' => 1],
            ['id' => 14, 'supplier_id' => 2, 'product_id' => 14, 'DatumAangeleverd' => '2024-03-23', 'DatumEerstVolgendeLevering' => '2024-04-23', 'IsActief' => 1],
            ['id' => 15, 'supplier_id' => 2, 'product_id' => 15, 'DatumAangeleverd' => '2024-02-02', 'DatumEerstVolgendeLevering' => '2024-03-02', 'IsActief' => 1],
            ['id' => 16, 'supplier_id' => 1, 'product_id' => 16, 'DatumAangeleverd' => '2024-02-16', 'DatumEerstVolgendeLevering' => '2024-03-16', 'IsActief' => 1],
            ['id' => 17, 'supplier_id' => 1, 'product_id' => 17, 'DatumAangeleverd' => '2024-03-25', 'DatumEerstVolgendeLevering' => '2024-04-25', 'IsActief' => 1],
            ['id' => 18, 'supplier_id' => 1, 'product_id' => 18, 'DatumAangeleverd' => '2024-03-13', 'DatumEerstVolgendeLevering' => '2024-04-13', 'IsActief' => 1],
            ['id' => 19, 'supplier_id' => 1, 'product_id' => 19, 'DatumAangeleverd' => '2024-03-23', 'DatumEerstVolgendeLevering' => '2024-04-23', 'IsActief' => 1],
            ['id' => 20, 'supplier_id' => 4, 'product_id' => 20, 'DatumAangeleverd' => '2024-02-21', 'DatumEerstVolgendeLevering' => '2024-03-21', 'IsActief' => 1],
            ['id' => 21, 'supplier_id' => 2, 'product_id' => 21, 'DatumAangeleverd' => '2024-03-31', 'DatumEerstVolgendeLevering' => '2024-04-30', 'IsActief' => 1],
            ['id' => 22, 'supplier_id' => 1, 'product_id' => 22, 'DatumAangeleverd' => '2024-03-27', 'DatumEerstVolgendeLevering' => '2024-04-27', 'IsActief' => 1],
            ['id' => 23, 'supplier_id' => 3, 'product_id' => 23, 'DatumAangeleverd' => '2024-04-11', 'DatumEerstVolgendeLevering' => '2024-04-18', 'IsActief' => 1],
            ['id' => 24, 'supplier_id' => 3, 'product_id' => 24, 'DatumAangeleverd' => '2024-04-07', 'DatumEerstVolgendeLevering' => '2024-04-14', 'IsActief' => 1],
            ['id' => 25, 'supplier_id' => 1, 'product_id' => 25, 'DatumAangeleverd' => '2024-05-07', 'DatumEerstVolgendeLevering' => '2024-05-14', 'IsActief' => 1],
            ['id' => 26, 'supplier_id' => 2, 'product_id' => 26, 'DatumAangeleverd' => '2024-05-05', 'DatumEerstVolgendeLevering' => '2024-05-12', 'IsActief' => 1],
        ]);

    }
}
