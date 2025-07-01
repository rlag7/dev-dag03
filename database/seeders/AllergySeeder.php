<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AllergySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('allergies')->insert([
            ['id' => 1, 'Naam' => 'Gluten', 'Omschrijving' => 'Allergisch voor gluten', 'AnafylactischRisico' => 'zeerlaag', 'IsActief' => true, 'Opmerking' => null, 'DatumAangemaakt' => Carbon::now()],
            ['id' => 2, 'Naam' => 'Pindas', 'Omschrijving' => 'Allergisch voor pindas', 'AnafylactischRisico' => 'Hoog', 'IsActief' => true, 'Opmerking' => null, 'DatumAangemaakt' => Carbon::now()],
            ['id' => 3, 'Naam' => 'Schaaldieren', 'Omschrijving' => 'Allergisch voor schaaldieren', 'AnafylactischRisico' => 'RedelijkHoog', 'IsActief' => true, 'Opmerking' => null, 'DatumAangemaakt' => Carbon::now()],
            ['id' => 4, 'Naam' => 'Hazelnoten', 'Omschrijving' => 'Allergisch voor hazelnoten', 'AnafylactischRisico' => 'laag', 'IsActief' => true, 'Opmerking' => null, 'DatumAangemaakt' => Carbon::now()],
            ['id' => 5, 'Naam' => 'Lactose', 'Omschrijving' => 'Allergisch voor lactose', 'AnafylactischRisico' => 'Zeerlaag', 'IsActief' => true, 'Opmerking' => null, 'DatumAangemaakt' => Carbon::now()],
            ['id' => 6, 'Naam' => 'Soja', 'Omschrijving' => 'Allergisch voor soja', 'AnafylactischRisico' => 'Zeerlaag', 'IsActief' => true, 'Opmerking' => null, 'DatumAangemaakt' => Carbon::now()],
        ]);
    }
}
