<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class   CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'id' => 1,
                'Naam' => 'AGF',
                'Omschrijving' => 'Aardappelen groente en fruit',
                'IsActief' => true,
                'Opmerking' => null,
                'DatumAangemaakt' => Carbon::now(),
                'DatumGewijzigd' => null,
            ],
            [
                'id' => 2,
                'Naam' => 'KV',
                'Omschrijving' => 'Kaas en vleeswaren',
                'IsActief' => true,
                'Opmerking' => null,
                'DatumAangemaakt' => Carbon::now(),
                'DatumGewijzigd' => null,
            ],
            [
                'id' => 3,
                'Naam' => 'ZPE',
                'Omschrijving' => 'Zuivel plantaardig en eieren',
                'IsActief' => true,
                'Opmerking' => null,
                'DatumAangemaakt' => Carbon::now(),
                'DatumGewijzigd' => null,
            ],
            [
                'id' => 4,
                'Naam' => 'BB',
                'Omschrijving' => 'Bakkerij en Banket',
                'IsActief' => true,
                'Opmerking' => null,
                'DatumAangemaakt' => Carbon::now(),
                'DatumGewijzigd' => null,
            ],
            [
                'id' => 5,
                'Naam' => 'FSKT',
                'Omschrijving' => 'Frisdranken, sappen, koffie en thee',
                'IsActief' => true,
                'Opmerking' => null,
                'DatumAangemaakt' => Carbon::now(),
                'DatumGewijzigd' => null,
            ],
            [
                'id' => 6,
                'Naam' => 'PRW',
                'Omschrijving' => 'Pasta, rijst en wereldkeuken',
                'IsActief' => true,
                'Opmerking' => null,
                'DatumAangemaakt' => Carbon::now(),
                'DatumGewijzigd' => null,
            ],
            [
                'id' => 7,
                'Naam' => 'SSKO',
                'Omschrijving' => 'Soepen, sauzen, kruiden en olie',
                'IsActief' => true,
                'Opmerking' => null,
                'DatumAangemaakt' => Carbon::now(),
                'DatumGewijzigd' => null,
            ],
            [
                'id' => 8,
                'Naam' => 'SKCC',
                'Omschrijving' => 'Snoep, koek, chips en chocolade',
                'IsActief' => true,
                'Opmerking' => null,
                'DatumAangemaakt' => Carbon::now(),
                'DatumGewijzigd' => null,
            ],
            [
                'id' => 9,
                'Naam' => 'BVH',
                'Omschrijving' => 'Baby, verzorging en hygiëne',
                'IsActief' => true,
                'Opmerking' => null,
                'DatumAangemaakt' => Carbon::now(),
                'DatumGewijzigd' => null,
            ],
        ]);
    }
}
