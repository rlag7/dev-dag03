<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AllergyPersonSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('allergy_person')->insert([
            ['id' => 1, 'person_id' => 4, 'allergy_id' => 1, 'IsActief' => 1],
            ['id' => 2, 'person_id' => 5, 'allergy_id' => 2, 'IsActief' => 1],
            ['id' => 3, 'person_id' => 6, 'allergy_id' => 3, 'IsActief' => 1],
            ['id' => 4, 'person_id' => 7, 'allergy_id' => 4, 'IsActief' => 1],
            ['id' => 5, 'person_id' => 8, 'allergy_id' => 3, 'IsActief' => 1],
            ['id' => 6, 'person_id' => 2, 'allergy_id' => 2, 'IsActief' => 1],
            ['id' => 7, 'person_id' => 5, 'allergy_id' => 5, 'IsActief' => 1],
            ['id' => 8, 'person_id' => 2, 'allergy_id' => 2, 'IsActief' => 1],
            ['id' => 9, 'person_id' => 4, 'allergy_id' => 4, 'IsActief' => 1],
            ['id' => 10, 'person_id' => 1, 'allergy_id' => 1, 'IsActief' => 1],
            ['id' => 11, 'person_id' => 3, 'allergy_id' => 3, 'IsActief' => 1],
            ['id' => 12, 'person_id' => 5, 'allergy_id' => 5, 'IsActief' => 1],
            ['id' => 13, 'person_id' => 1, 'allergy_id' => 1, 'IsActief' => 1],
            ['id' => 14, 'person_id' => 2, 'allergy_id' => 2, 'IsActief' => 1],
            ['id' => 15, 'person_id' => 4, 'allergy_id' => 4, 'IsActief' => 1],
            ['id' => 16, 'person_id' => 4, 'allergy_id' => 4, 'IsActief' => 1],
        ]);
    }
}
