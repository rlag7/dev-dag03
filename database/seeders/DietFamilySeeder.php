<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DietFamilySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('diet_family')->insert([
            ['id' => 1, 'family_id' => 1, 'diet_id' => 2, 'IsActief' => 1],
            ['id' => 2, 'family_id' => 2, 'diet_id' => 4, 'IsActief' => 1],
            ['id' => 3, 'family_id' => 3, 'diet_id' => 4, 'IsActief' => 1],
            ['id' => 4, 'family_id' => 4, 'diet_id' => 3, 'IsActief' => 1],
            ['id' => 5, 'family_id' => 5, 'diet_id' => 2, 'IsActief' => 1],
        ]);

    }
}
