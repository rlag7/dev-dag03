<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactSupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('contact_supplier')->insert([
            ['id' => 1, 'supplier_id' => 1, 'contact_id' => 7, 'IsActief' => 1],
            ['id' => 2, 'supplier_id' => 2, 'contact_id' => 8, 'IsActief' => 1],
            ['id' => 3, 'supplier_id' => 3, 'contact_id' => 9, 'IsActief' => 1],
            ['id' => 4, 'supplier_id' => 4, 'contact_id' => 10, 'IsActief' => 1],
            ['id' => 5, 'supplier_id' => 6, 'contact_id' => 11, 'IsActief' => 1],
            ['id' => 6, 'supplier_id' => 7, 'contact_id' => 12, 'IsActief' => 1],
            ['id' => 7, 'supplier_id' => 8, 'contact_id' => 13, 'IsActief' => 1],
        ]);

    }
}
