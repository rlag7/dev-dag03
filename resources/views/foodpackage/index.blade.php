<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Overzicht Pakketten</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-6 bg-gray-100">
<div class="w-full max-w-7xl mx-auto text-left">

    <div class="bg-white shadow-lg rounded p-6 relative">
        {{-- Header --}}
        <div class="flex justify-between items-center mb-6 flex-wrap gap-4">
            <h2 class="text-2xl font-semibold text-green-700 underline">
                Overzicht Pakketten
            </h2>
            <a href="{{ route('dashboard') }}"
               class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded transition">
                Home
            </a>
        </div>

        {{-- Filter op Eetwens --}}
       
            <label for="eetwens" class="text-sm font-medium">Filter op Eetwens:</label>
            <select name="eetwens" id="eetwens" class="border rounded px-3 py-2">
                <option value="">-- Alle eetwensen --</option>
                {{-- Vervang dit met dynamische eetwensen als nodig --}}
                <option value="vegetarisch" {{ request('eetwens') == 'vegetarisch' ? 'selected' : '' }}>Vegetarisch</option>
                <option value="glutenvrij" {{ request('eetwens') == 'glutenvrij' ? 'selected' : '' }}>Glutenvrij</option>
                <option value="halal" {{ request('eetwens') == 'halal' ? 'selected' : '' }}>Halal</option>
            </select>
            <button type="submit" class="bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-800">
                Filter
            </button>
        </form>

        {{-- Tabel --}}
        <div class="overflow-x-auto">
            <table class="min-w-full text-sm text-left border">
                <thead class="bg-gray-100 font-semibold">
                <tr>
                    <th class="px-4 py-2 border">Gezinsnaam</th>
                    <th class="px-4 py-2 border">Omschrijving</th>
                    <th class="px-4 py-2 border">Volwassenen</th>
                    <th class="px-4 py-2 border">Kinderen</th>
                    <th class="px-4 py-2 border">Baby’s</th>
                    <th class="px-4 py-2 border">Vertegenwoordiger</th>
                    <th class="px-4 py-2 border">Details</th>
                </tr>
                </thead>
                <tbody>
                @forelse($pakketten as $pakket)
                    @php
                        $family = $pakket->family;
                    @endphp
                    @if ($family)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-2 border">{{ $family->Naam }}</td>
                            <td class="px-4 py-2 border">{{ $family->Omschrijving ?? '-' }}</td>
                            <td class="px-4 py-2 border">{{ $family->AantalVolwassenen }}</td>
                            <td class="px-4 py-2 border">{{ $family->AantalKinderen }}</td>
                            <td class="px-4 py-2 border">{{ $family->AantalBabys }}</td>
                            <td class="px-4 py-2 border">
                                @php
                             $vertegenwoordiger = $family->people->firstWhere('IsVertegenwoordiger', true);
                        @endphp
                            @if($vertegenwoordiger)
                                {{ $vertegenwoordiger->Voornaam }}
                                {{ $vertegenwoordiger->Tussenvoegsel ? $vertegenwoordiger->Tussenvoegsel : '' }}
                                {{ $vertegenwoordiger->Achternaam }}
                            @else
                                -
                            @endif
                            </td>
                            <td class="px-4 py-2 border text-center">
                           
                            </td>
                        </tr>
                    @endif
                @empty
                    <tr>
                        <td colspan="7" class="px-4 py-3 text-center bg-yellow-100 text-yellow-700">
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
