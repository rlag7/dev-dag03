<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FoodPackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('food_packages')->insert([
            ['id' => 1, 'family_id' => 1, 'PakketNummer' => 'P001', 'DatumSamenstelling' => '2024-04-30', 'DatumUitgifte' => '2024-05-01', 'Status' => 'Uitgeleverd', 'IsActief' => 1],
            ['id' => 2, 'family_id' => 2, 'PakketNummer' => 'P002', 'DatumSamenstelling' => '2024-05-01', 'DatumUitgifte' => '2024-05-02', 'Status' => 'Uitgeleverd', 'IsActief' => 1],
            ['id' => 3, 'family_id' => 3, 'PakketNummer' => 'P003', 'DatumSamenstelling' => '2024-05-03', 'DatumUitgifte' => '2024-05-04', 'Status' => 'Uitgeleverd', 'IsActief' => 1],
            ['id' => 4, 'family_id' => 4, 'PakketNummer' => 'P004', 'DatumSamenstelling' => '2024-05-06', 'DatumUitgifte' => '2024-05-06', 'Status' => 'Uitgeleverd', 'IsActief' => 1],
            ['id' => 5, 'family_id' => 5, 'PakketNummer' => 'P005', 'DatumSamenstelling' => '2024-05-07', 'DatumUitgifte' => '2024-05-08', 'Status' => 'Uitgeleverd', 'IsActief' => 1],
            ['id' => 6, 'family_id' => 6, 'PakketNummer' => 'P006', 'DatumSamenstelling' => '2024-05-08', 'DatumUitgifte' => '2024-05-09', 'Status' => 'Uitgeleverd', 'IsActief' => 1],
        ]);

    }
}
