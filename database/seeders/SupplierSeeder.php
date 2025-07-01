<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SupplierSeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now()->format('Y-m-d H:i:s');

        // Leveranciers + gekoppelde contact ID's
        $suppliers = [
            ['id' => 1, 'Naam' => 'Albert Heijn', 'ContactPersoon' => 'Ruud ter Weijden', 'LeverancierNummer' => 'L0001', 'LeverancierType' => 'Bedrijf', 'ContactId' => 7],
            ['id' => 2, 'Naam' => 'Albertus Kerk', 'ContactPersoon' => 'Leo Pastoor', 'LeverancierNummer' => 'L0002', 'LeverancierType' => 'Instelling', 'ContactId' => 8],
            ['id' => 3, 'Naam' => 'Gemeente Utrecht', 'ContactPersoon' => 'Mohammed Yazidi', 'LeverancierNummer' => 'L0003', 'LeverancierType' => 'Overheid', 'ContactId' => 9],
            ['id' => 4, 'Naam' => 'Boerderij Meerhoven', 'ContactPersoon' => 'Bertus van Driel', 'LeverancierNummer' => 'L0004', 'LeverancierType' => 'Particulier', 'ContactId' => 10],
            ['id' => 5, 'Naam' => 'Jan van der Heijden', 'ContactPersoon' => 'Jan van der Heijden', 'LeverancierNummer' => 'L0005', 'LeverancierType' => 'Donor', 'ContactId' => 11],
            ['id' => 6, 'Naam' => 'Vomar', 'ContactPersoon' => 'Jaco Pastorius', 'LeverancierNummer' => 'L0006', 'LeverancierType' => 'Bedrijf', 'ContactId' => 12],
            ['id' => 7, 'Naam' => 'DekaMarkt', 'ContactPersoon' => 'Sil den Dollaard', 'LeverancierNummer' => 'L0007', 'LeverancierType' => 'Bedrijf', 'ContactId' => 13],
            ['id' => 8, 'Naam' => 'Gemeente Vught', 'ContactPersoon' => 'Jan Blokker', 'LeverancierNummer' => 'L0008', 'LeverancierType' => 'Overheid', 'ContactId' => 13],
        ];

        foreach ($suppliers as $supplier) {
            DB::table('suppliers')->insert([
                'id' => $supplier['id'],
                'Naam' => $supplier['Naam'],
                'ContactPersoon' => $supplier['ContactPersoon'],
                'LeverancierNummer' => $supplier['LeverancierNummer'],
                'LeverancierType' => $supplier['LeverancierType'],
                'IsActief' => true,
                'Opmerking' => null,
                'DatumAangemaakt' => $now,
                'DatumGewijzigd' => $now,
            ]);

            DB::table('contact_supplier')->insert([
                'supplier_id' => $supplier['id'],
                'contact_id' => $supplier['ContactId'],
            ]);
        }
    }
}
