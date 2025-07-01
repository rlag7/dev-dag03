<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class WarehouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('warehouses')->insert([
            ['id' => 1,  'Ontvangstdatum' => '2024-05-12', 'Uitleveringsdatum' => null, 'VerpakkingsEenheid' => '5 kg',            'Aantal' => 20,  'IsActief' => true, 'Opmerking' => null, 'DatumAangemaakt' => Carbon::now(), 'DatumGewijzigd' => null],
            ['id' => 2,  'Ontvangstdatum' => '2024-05-26', 'Uitleveringsdatum' => null, 'VerpakkingsEenheid' => '2.5 kg',         'Aantal' => 40,  'IsActief' => true, 'Opmerking' => null, 'DatumAangemaakt' => Carbon::now(), 'DatumGewijzigd' => null],
            ['id' => 3,  'Ontvangstdatum' => '2024-04-02', 'Uitleveringsdatum' => null, 'VerpakkingsEenheid' => '1 kg',           'Aantal' => 30,  'IsActief' => true, 'Opmerking' => null, 'DatumAangemaakt' => Carbon::now(), 'DatumGewijzigd' => null],
            ['id' => 4,  'Ontvangstdatum' => '2024-05-16', 'Uitleveringsdatum' => null, 'VerpakkingsEenheid' => '1.5 kg',         'Aantal' => 25,  'IsActief' => true, 'Opmerking' => null, 'DatumAangemaakt' => Carbon::now(), 'DatumGewijzigd' => null],
            ['id' => 5,  'Ontvangstdatum' => '2024-05-23', 'Uitleveringsdatum' => null, 'VerpakkingsEenheid' => '4 stuks',        'Aantal' => 75,  'IsActief' => true, 'Opmerking' => null, 'DatumAangemaakt' => Carbon::now(), 'DatumGewijzigd' => null],
            ['id' => 6,  'Ontvangstdatum' => '2024-03-12', 'Uitleveringsdatum' => null, 'VerpakkingsEenheid' => '1 kg/tros',      'Aantal' => 60,  'IsActief' => true, 'Opmerking' => null, 'DatumAangemaakt' => Carbon::now(), 'DatumGewijzigd' => null],
            ['id' => 7,  'Ontvangstdatum' => '2024-03-19', 'Uitleveringsdatum' => null, 'VerpakkingsEenheid' => '2 kg/tros',      'Aantal' => 200, 'IsActief' => true, 'Opmerking' => null, 'DatumAangemaakt' => Carbon::now(), 'DatumGewijzigd' => null],
            ['id' => 8,  'Ontvangstdatum' => '2024-06-19', 'Uitleveringsdatum' => null, 'VerpakkingsEenheid' => '200 g',          'Aantal' => 45,  'IsActief' => true, 'Opmerking' => null, 'DatumAangemaakt' => Carbon::now(), 'DatumGewijzigd' => null],
            ['id' => 9,  'Ontvangstdatum' => '2024-07-23', 'Uitleveringsdatum' => null, 'VerpakkingsEenheid' => '100 g',          'Aantal' => 60,  'IsActief' => true, 'Opmerking' => null, 'DatumAangemaakt' => Carbon::now(), 'DatumGewijzigd' => null],
            ['id' => 10, 'Ontvangstdatum' => '2024-07-23', 'Uitleveringsdatum' => null, 'VerpakkingsEenheid' => '1 liter',        'Aantal' => 120, 'IsActief' => true, 'Opmerking' => null, 'DatumAangemaakt' => Carbon::now(), 'DatumGewijzigd' => null],
            ['id' => 11, 'Ontvangstdatum' => '2024-06-02', 'Uitleveringsdatum' => null, 'VerpakkingsEenheid' => '250 g',          'Aantal' => 80,  'IsActief' => true, 'Opmerking' => null, 'DatumAangemaakt' => Carbon::now(), 'DatumGewijzigd' => null],
            ['id' => 12, 'Ontvangstdatum' => '2024-01-04', 'Uitleveringsdatum' => null, 'VerpakkingsEenheid' => '6 stuks',        'Aantal' => 120, 'IsActief' => true, 'Opmerking' => null, 'DatumAangemaakt' => Carbon::now(), 'DatumGewijzigd' => null],
            ['id' => 13, 'Ontvangstdatum' => '2024-04-07', 'Uitleveringsdatum' => null, 'VerpakkingsEenheid' => '800 g',          'Aantal' => 220, 'IsActief' => true, 'Opmerking' => null, 'DatumAangemaakt' => Carbon::now(), 'DatumGewijzigd' => null],
            ['id' => 14, 'Ontvangstdatum' => '2024-04-04', 'Uitleveringsdatum' => null, 'VerpakkingsEenheid' => '1 stuk',         'Aantal' => 130, 'IsActief' => true, 'Opmerking' => null, 'DatumAangemaakt' => Carbon::now(), 'DatumGewijzigd' => null],
            ['id' => 15, 'Ontvangstdatum' => '2024-04-28', 'Uitleveringsdatum' => null, 'VerpakkingsEenheid' => '150 ml',         'Aantal' => 72,  'IsActief' => true, 'Opmerking' => null, 'DatumAangemaakt' => Carbon::now(), 'DatumGewijzigd' => null],
            ['id' => 16, 'Ontvangstdatum' => '2024-04-19', 'Uitleveringsdatum' => null, 'VerpakkingsEenheid' => '1 l',            'Aantal' => 12,  'IsActief' => true, 'Opmerking' => null, 'DatumAangemaakt' => Carbon::now(), 'DatumGewijzigd' => null],
            ['id' => 17, 'Ontvangstdatum' => '2024-04-23', 'Uitleveringsdatum' => null, 'VerpakkingsEenheid' => '250 g',          'Aantal' => 300, 'IsActief' => true, 'Opmerking' => null, 'DatumAangemaakt' => Carbon::now(), 'DatumGewijzigd' => null],
            ['id' => 18, 'Ontvangstdatum' => '2024-03-02', 'Uitleveringsdatum' => null, 'VerpakkingsEenheid' => '25 zakjes',      'Aantal' => 280, 'IsActief' => true, 'Opmerking' => null, 'DatumAangemaakt' => Carbon::now(), 'DatumGewijzigd' => null],
            ['id' => 19, 'Ontvangstdatum' => '2024-04-16', 'Uitleveringsdatum' => null, 'VerpakkingsEenheid' => '500 g',          'Aantal' => 330, 'IsActief' => true, 'Opmerking' => null, 'DatumAangemaakt' => Carbon::now(), 'DatumGewijzigd' => null],
            ['id' => 20, 'Ontvangstdatum' => '2024-04-25', 'Uitleveringsdatum' => null, 'VerpakkingsEenheid' => '1 kg',           'Aantal' => 34,  'IsActief' => true, 'Opmerking' => null, 'DatumAangemaakt' => Carbon::now(), 'DatumGewijzigd' => null],
            ['id' => 21, 'Ontvangstdatum' => '2024-04-13', 'Uitleveringsdatum' => null, 'VerpakkingsEenheid' => '50 g',           'Aantal' => 23,  'IsActief' => true, 'Opmerking' => null, 'DatumAangemaakt' => Carbon::now(), 'DatumGewijzigd' => null],
            ['id' => 22, 'Ontvangstdatum' => '2024-04-23', 'Uitleveringsdatum' => null, 'VerpakkingsEenheid' => '1 l',            'Aantal' => 46,  'IsActief' => true, 'Opmerking' => null, 'DatumAangemaakt' => Carbon::now(), 'DatumGewijzigd' => null],
            ['id' => 23, 'Ontvangstdatum' => '2024-04-21', 'Uitleveringsdatum' => null, 'VerpakkingsEenheid' => '250 ml',         'Aantal' => 98,  'IsActief' => true, 'Opmerking' => null, 'DatumAangemaakt' => Carbon::now(), 'DatumGewijzigd' => null],
            ['id' => 24, 'Ontvangstdatum' => '2024-04-30', 'Uitleveringsdatum' => null, 'VerpakkingsEenheid' => '1 potje',        'Aantal' => 56,  'IsActief' => true, 'Opmerking' => null, 'DatumAangemaakt' => Carbon::now(), 'DatumGewijzigd' => null],
            ['id' => 25, 'Ontvangstdatum' => '2024-04-27', 'Uitleveringsdatum' => null, 'VerpakkingsEenheid' => '1 l',            'Aantal' => 210, 'IsActief' => true, 'Opmerking' => null, 'DatumAangemaakt' => Carbon::now(), 'DatumGewijzigd' => null],
            ['id' => 26, 'Ontvangstdatum' => '2024-04-01', 'Uitleveringsdatum' => null, 'VerpakkingsEenheid' => '4 stuks',        'Aantal' => 24,  'IsActief' => true, 'Opmerking' => null, 'DatumAangemaakt' => Carbon::now(), 'DatumGewijzigd' => null],
            ['id' => 27, 'Ontvangstdatum' => '2024-04-07', 'Uitleveringsdatum' => null, 'VerpakkingsEenheid' => '300 g',          'Aantal' => 87,  'IsActief' => true, 'Opmerking' => null, 'DatumAangemaakt' => Carbon::now(), 'DatumGewijzigd' => null],
            ['id' => 28, 'Ontvangstdatum' => '2024-04-22', 'Uitleveringsdatum' => null, 'VerpakkingsEenheid' => '200 g',          'Aantal' => 230, 'IsActief' => true, 'Opmerking' => null, 'DatumAangemaakt' => Carbon::now(), 'DatumGewijzigd' => null],
            ['id' => 29, 'Ontvangstdatum' => '2024-04-21', 'Uitleveringsdatum' => null, 'VerpakkingsEenheid' => '80 g',           'Aantal' => 30,  'IsActief' => true, 'Opmerking' => null, 'DatumAangemaakt' => Carbon::now(), 'DatumGewijzigd' => null],
        ]);
    }
}
