<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ContactSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('contacts')->insert([
            [
                'id' => 1,
                'Straat' => 'Prinses Irenestraat',
                'Huisnummer' => '12',
                'Toevoeging' => 'A',
                'Postcode' => '5271TH',
                'Woonplaats' => 'Maaskantje',
                'Email' => 'j.van.zevenhuizen@gmail.com',
                'Mobiel' => '+31523456123',
                'IsActief' => true,
                'Opmerking' => null,
                'DatumAangemaakt' => Carbon::now(),
                'DatumGewijzigd' => null
            ],
            [
                'id' => 2,
                'Straat' => 'Gibraltarstraat',
                'Huisnummer' => '234',
                'Toevoeging' => null,
                'Postcode' => '5271TJ',
                'Woonplaats' => 'Maaskantje',
                'Email' => 'a.bergkamp@hotmail.com',
                'Mobiel' => '+31953456123',
                'IsActief' => true,
                'Opmerking' => null,
                'DatumAangemaakt' => Carbon::now(),
                'DatumGewijzigd' => null
            ],
            [
                'id' => 3,
                'Straat' => 'Der Kinderenstraat',
                'Huisnummer' => '456',
                'Toevoeging' => 'Bis',
                'Postcode' => '5271TH',
                'Woonplaats' => 'Maaskantje',
                'Email' => 's.van.de.heuvel@gmail.com',
                'Mobiel' => '+31323456533',
                'IsActief' => true,
                'Opmerking' => null,
                'DatumAangemaakt' => Carbon::now(),
                'DatumGewijzigd' => null
            ],
            [
                'id' => 4,
                'Straat' => 'Nachtegaalstraat',
                'Huisnummer' => '233',
                'Toevoeging' => 'A',
                'Postcode' => '5271TJ',
                'Woonplaats' => 'Maaskantje',
                'Email' => 'e.scherder@gmail.com',
                'Mobiel' => '+310923456123',
                'IsActief' => true,
                'Opmerking' => null,
                'DatumAangemaakt' => Carbon::now(),
                'DatumGewijzigd' => null
            ],
            [
                'id' => 5,
                'Straat' => 'Bertram Russellstraat',
                'Huisnummer' => '45',
                'Toevoeging' => null,
                'Postcode' => '5271TH',
                'Woonplaats' => 'Maaskantje',
                'Email' => 'f.de.jong@hotmail.com',
                'Mobiel' => '+310523456123',
                'IsActief' => true,
                'Opmerking' => null,
                'DatumAangemaakt' => Carbon::now(),
                'DatumGewijzigd' => null
            ],
            [
                'id' => 6,
                'Straat' => 'Leonardo Da VinciHof',
                'Huisnummer' => '34',
                'Toevoeging' => null,
                'Postcode' => '5271ZE',
                'Woonplaats' => 'Maaskantje',
                'Email' => 'h.van.der.berg@gmail.com',
                'Mobiel' => '+315323456123',
                'IsActief' => true,
                'Opmerking' => null,
                'DatumAangemaakt' => Carbon::now(),
                'DatumGewijzigd' => null
            ],
            [
                'id' => 7,
                'Straat' => 'Siegfried Knutsenlaan',
                'Huisnummer' => '234',
                'Toevoeging' => null,
                'Postcode' => '5271ZE',
                'Woonplaats' => 'Maaskantje',
                'Email' => 'r.ter.weijden@ah.nl',
                'Mobiel' => '+31323456123',
                'IsActief' => true,
                'Opmerking' => null,
                'DatumAangemaakt' => Carbon::now(),
                'DatumGewijzigd' => null
            ],
            [
                'id' => 8,
                'Straat' => 'Theo de Bokstraat',
                'Huisnummer' => '256',
                'Toevoeging' => null,
                'Postcode' => '5271ZH',
                'Woonplaats' => 'Maaskantje',
                'Email' => 'l.pastoor@gmail.com',
                'Mobiel' => '+315323456123',
                'IsActief' => true,
                'Opmerking' => null,
                'DatumAangemaakt' => Carbon::now(),
                'DatumGewijzigd' => null
            ],
            [
                'id' => 9,
                'Straat' => 'Meester van Leerhof',
                'Huisnummer' => '2',
                'Toevoeging' => 'A',
                'Postcode' => '5271ZH',
                'Woonplaats' => 'Maaskantje',
                'Email' => 'm.yazidi@gemeenteutrecht.nl',
                'Mobiel' => '+32323456123',
                'IsActief' => true,
                'Opmerking' => null,
                'DatumAangemaakt' => Carbon::now(),
                'DatumGewijzigd' => null
            ],
            [
                'id' => 10,
                'Straat' => 'Van Wemelenplantsoen',
                'Huisnummer' => '300',
                'Toevoeging' => null,
                'Postcode' => '5271TH',
                'Woonplaats' => 'Maaskantje',
                'Email' => 'b.van.driel@gmail.com',
                'Mobiel' => '+31223456123',
                'IsActief' => true,
                'Opmerking' => null,
                'DatumAangemaakt' => Carbon::now(),
                'DatumGewijzigd' => null
            ],
            [
                'id' => 11,
                'Straat' => 'Terlingenhof',
                'Huisnummer' => '20',
                'Toevoeging' => null,
                'Postcode' => '5271TH',
                'Woonplaats' => 'Maaskantje',
                'Email' => 'j.pastorius@gmail.com',
                'Mobiel' => '+31223456356',
                'IsActief' => true,
                'Opmerking' => null,
                'DatumAangemaakt' => Carbon::now(),
                'DatumGewijzigd' => null
            ],
            [
                'id' => 12,
                'Straat' => 'Veldhoen',
                'Huisnummer' => '31',
                'Toevoeging' => null,
                'Postcode' => '5271ZE',
                'Woonplaats' => 'Maaskantje',
                'Email' => 's.dollaard@gmail.com',
                'Mobiel' => '+31023452314',
                'IsActief' => true,
                'Opmerking' => null,
                'DatumAangemaakt' => Carbon::now(),
                'DatumGewijzigd' => null
            ],
            [
                'id' => 13,
                'Straat' => 'ScheringaDreef',
                'Huisnummer' => '37',
                'Toevoeging' => null,
                'Postcode' => '5271ZE',
                'Woonplaats' => 'Vught',
                'Email' => 'j.blokker@gemeentevught.nl',
                'Mobiel' => '+312323452314',
                'IsActief' => true,
                'Opmerking' => null,
                'DatumAangemaakt' => Carbon::now(),
                'DatumGewijzigd' => null
            ]
        ]);
    }
}
