<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DietSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('diets')->insert([
            ['id' => 1, 'Naam' => 'GeenVarken', 'Omschrijving' => 'Geen Varkensvlees', 'IsActief' => true, 'Opmerking' => null, 'DatumAangemaakt' => Carbon::now()],
            ['id' => 2, 'Naam' => 'Veganistisch', 'Omschrijving' => 'Geen Zuivelproducten en Vlees', 'IsActief' => true, 'Opmerking' => null, 'DatumAangemaakt' => Carbon::now()],
            ['id' => 3, 'Naam' => 'Vegetarisch', 'Omschrijving' => 'Geen Vlees', 'IsActief' => true, 'Opmerking' => null, 'DatumAangemaakt' => Carbon::now()],
            ['id' => 4, 'Naam' => 'Omnivoor', 'Omschrijving' => 'Geen Beperkingen', 'IsActief' => true, 'Opmerking' => null, 'DatumAangemaakt' => Carbon::now()],
        ]);
    }
}
