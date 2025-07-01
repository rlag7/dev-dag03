<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class FamilySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('families')->insert([
            [
                'id' => 1,
                'Naam' => 'ZevenhuizenGezin',
                'Code' => 'G0001',
                'Omschrijving' => 'Bijstandsgezin',
                'AantalVolwassenen' => 2,
                'AantalKinderen' => 2,
                'AantalBabys' => 0,
                'TotaalAantalPersonen' => 4,
                'IsActief' => true,
                'Opmerking' => null,
                'DatumAangemaakt' => Carbon::now(),
                'DatumGewijzigd' => null
            ],
            [
                'id' => 2,
                'Naam' => 'BergkampGezin',
                'Code' => 'G0002',
                'Omschrijving' => 'Bijstandsgezin',
                'AantalVolwassenen' => 2,
                'AantalKinderen' => 1,
                'AantalBabys' => 1,
                'TotaalAantalPersonen' => 4,
                'IsActief' => true,
                'Opmerking' => null,
                'DatumAangemaakt' => Carbon::now(),
                'DatumGewijzigd' => null
            ],
            [
                'id' => 3,
                'Naam' => 'HeuvelGezin',
                'Code' => 'G0003',
                'Omschrijving' => 'Bijstandsgezin',
                'AantalVolwassenen' => 2,
                'AantalKinderen' => 0,
                'AantalBabys' => 0,
                'TotaalAantalPersonen' => 2,
                'IsActief' => true,
                'Opmerking' => null,
                'DatumAangemaakt' => Carbon::now(),
                'DatumGewijzigd' => null
            ],
            [
                'id' => 4,
                'Naam' => 'ScherderGezin',
                'Code' => 'G0004',
                'Omschrijving' => 'Bijstandsgezin',
                'AantalVolwassenen' => 1,
                'AantalKinderen' => 0,
                'AantalBabys' => 2,
                'TotaalAantalPersonen' => 3,
                'IsActief' => true,
                'Opmerking' => null,
                'DatumAangemaakt' => Carbon::now(),
                'DatumGewijzigd' => null
            ],
            [
                'id' => 5,
                'Naam' => 'DeJongGezin',
                'Code' => 'G0005',
                'Omschrijving' => 'Bijstandsgezin',
                'AantalVolwassenen' => 1,
                'AantalKinderen' => 1,
                'AantalBabys' => 0,
                'TotaalAantalPersonen' => 2,
                'IsActief' => true,
                'Opmerking' => null,
                'DatumAangemaakt' => Carbon::now(),
                'DatumGewijzigd' => null
            ],
            [
                'id' => 6,
                'Naam' => 'VanderBergGezin',
                'Code' => 'G0006',
                'Omschrijving' => 'AlleenGaande',
                'AantalVolwassenen' => 1,
                'AantalKinderen' => 0,
                'AantalBabys' => 0,
                'TotaalAantalPersonen' => 1,
                'IsActief' => true,
                'Opmerking' => null,
                'DatumAangemaakt' => Carbon::now(),
                'DatumGewijzigd' => null
            ],
        ]);
    }
}
