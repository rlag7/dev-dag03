<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Overzicht Pakketten</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-6 bg-gray-100">
<div class="w-full max-w-7xl mx-auto text-left">

    <div class="bg-white shadow-lg rounded p-4 relative">
        <div class="flex justify-between items-center mb-4 flex-wrap gap-4">
            <h2 class="text-2xl font-semibold text-green-700 underline">
                Overzicht Pakketten
            </h2>

            <a href="{{ route('dashboard') }}"
               class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded transition">
                Home
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full text-sm text-left border">
                <thead class="bg-gray-100 font-semibold">
                <tr>
                    <th class="px-4 py-2 border">ID</th>
                    <th class="px-4 py-2 border">Family ID</th>
                    <th class="px-4 py-2 border">Pakket Nummer</th>
                    <th class="px-4 py-2 border">Datum Samenstelling</th>
                    <th class="px-4 py-2 border">Datum Uitgifte</th>
                    <th class="px-4 py-2 border">Status</th>
                    <th class="px-4 py-2 border">Is Actief</th>
                    <th class="px-4 py-2 border">Opmerking</th>
                    <th class="px-4 py-2 border">Aangemaakt</th>
                    <th class="px-4 py-2 border">Gewijzigd</th>
                </tr>
                </thead>
                <tbody>
                @forelse($pakketten as $pakket)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2 border">{{ $pakket->id }}</td>
                        <td class="px-4 py-2 border">{{ $pakket->family_id }}</td>
                        <td class="px-4 py-2 border">{{ $pakket->PakketNummer }}</td>
                        <td class="px-4 py-2 border">{{ $pakket->DatumSamenstelling }}</td>
                        <td class="px-4 py-2 border">{{ $pakket->DatumUitgifte ?? '-' }}</td>
                        <td class="px-4 py-2 border">{{ $pakket->Status }}</td>
                        <td class="px-4 py-2 border">{{ $pakket->IsActief ? 'Ja' : 'Nee' }}</td>
                        <td class="px-4 py-2 border">{{ $pakket->Opmerking ?? '-' }}</td>
                        <td class="px-4 py-2 border">
                            {{ $pakket->DatumAangemaakt }}
                        </td>
                        <td class="px-4 py-2 border">
                            {{ $pakket->DatumGewijzigd }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="10" class="px-4 py-3 text-center bg-yellow-100 text-yellow-700">
                            Geen pakketten gevonden.
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
