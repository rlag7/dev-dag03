<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ContactFamilySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('contact_family')->insert([
            ['id' => 1, 'family_id' => 1, 'contact_id' => 1, 'IsActief' => 1],
            ['id' => 2, 'family_id' => 2, 'contact_id' => 2, 'IsActief' => 1],
            ['id' => 3, 'family_id' => 3, 'contact_id' => 3, 'IsActief' => 1],
            ['id' => 4, 'family_id' => 4, 'contact_id' => 4, 'IsActief' => 1],
            ['id' => 5, 'family_id' => 5, 'contact_id' => 5, 'IsActief' => 1],
            ['id' => 6, 'family_id' => 6, 'contact_id' => 6, 'IsActief' => 1],
        ]);

    }
}
