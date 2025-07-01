<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('suppliers')->insert([
            ['id' => 1, 'Naam' => 'Jumbo', 'ContactPersoon' => 'Jan de Groot', 'LeverancierNummer' => 'L001', 'LeverancierType' => 'Supermarkt', 'IsActief' => 1, 'Opmerking' => 'grote leverancier'],
            ['id' => 2, 'Naam' => 'Albert Heijn', 'ContactPersoon' => 'Piet van Dijk', 'LeverancierNummer' => 'L002', 'LeverancierType' => 'Supermarkt', 'IsActief' => 1, 'Opmerking' => null],
            ['id' => 3, 'Naam' => 'Voedselcentrale', 'ContactPersoon' => 'Karin Smits', 'LeverancierNummer' => 'L003', 'LeverancierType' => 'Distributiecentrum', 'IsActief' => 1, 'Opmerking' => null],
            ['id' => 4, 'Naam' => 'Plus', 'ContactPersoon' => 'Frits Jansen', 'LeverancierNummer' => 'L004', 'LeverancierType' => 'Supermarkt', 'IsActief' => 1, 'Opmerking' => null],
            ['id' => 5, 'Naam' => 'Sligro', 'ContactPersoon' => 'Marijke Meijer', 'LeverancierNummer' => 'L005', 'LeverancierType' => 'Groothandel', 'IsActief' => 1, 'Opmerking' => null],
            ['id' => 6, 'Naam' => 'Boerderij De Lente', 'ContactPersoon' => 'Bert Boer', 'LeverancierNummer' => 'L006', 'LeverancierType' => 'Boerderij', 'IsActief' => 1, 'Opmerking' => 'versproducten'],
            ['id' => 7, 'Naam' => 'Stichting Restvoedsel', 'ContactPersoon' => 'Sanne Stichting', 'LeverancierNummer' => 'L007', 'LeverancierType' => 'Non-profit', 'IsActief' => 1, 'Opmerking' => null],
            ['id' => 8, 'Naam' => 'Voedselbank Den Bosch', 'ContactPersoon' => 'Johan Maas', 'LeverancierNummer' => 'L008', 'LeverancierType' => 'Voedselbank', 'IsActief' => 1, 'Opmerking' => null],
        ]);

    }
}
