@extends('layouts.app')

@section('content')
    <div class="mt-8 flex justify-center px-4">
        <div class="w-full max-w-screen-xl bg-white p-6 rounded shadow">

            {{-- Titel + Filter op 1 regel --}}
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-4">
                <h1 class="text-xl font-semibold text-green-700">Overzicht gezinnen met allergieën</h1>

                <form method="GET" action="{{ route('manager.allergie.index') }}" class="flex flex-col sm:flex-row items-center gap-3">
                    <label for="allergy_id" class="text-sm font-medium">Selecteer Allergie</label>
                    <select name="allergy_id" id="allergy_id" class="border rounded px-3 py-2">
                        <option value="">-- Alle allergieën --</option>
                        @foreach($allergies as $allergy)
                            <option value="{{ $allergy->id }}" {{ request('allergy_id') == $allergy->id ? 'selected' : '' }}>
                                {{ $allergy->Naam }}
                            </option>
                        @endforeach
                    </select>
                    <button type="submit" class="bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-800">
                        Toon Gezinnen
                    </button>
                </form>
            </div>

            {{-- Geen resultaten --}}
            @if($filtered && $families->isEmpty())
                <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded mb-6">
                    Er zijn geen gezinnen bekend die de geselecteerde allergie hebben.
                </div>
            @endif

            {{-- Tabeloverzicht --}}
            <div class="overflow-x-auto bg-white rounded shadow border border-gray-300">
                <table class="min-w-full text-sm text-left">
                    <thead class="bg-gray-100 text-gray-700">
                    <tr>
                        <th class="px-4 py-2 border">Naam</th>
                        <th class="px-4 py-2 border">Omschrijving</th>
                        <th class="px-4 py-2 border">Volwassenen</th>
                        <th class="px-4 py-2 border">Kinderen</th>
                        <th class="px-4 py-2 border">Babys</th>
                        <th class="px-4 py-2 border">Vertegenwoordiger</th>
                        <th class="px-4 py-2 border">Allergie Details</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($families as $family)
                        <tr class="border-t">
                            <td class="px-4 py-2 border">{{ $family->Naam }}</td>
                            <td class="px-4 py-2 border">{{ $family->Omschrijving ?? '-' }}</td>
                            <td class="px-4 py-2 border">
                                {{ $family->people->where('Leeftijdscategorie', 'volwassene')->count() }}
                            </td>
                            <td class="px-4 py-2 border">
                                {{ $family->people->where('Leeftijdscategorie', 'kind')->count() }}
                            </td>
                            <td class="px-4 py-2 border">
                                {{ $family->people->where('Leeftijdscategorie', 'baby')->count() }}
                            </td>
                            <td class="px-4 py-2 border">
                                {{ optional($family->people->firstWhere('IsVertegenwoordiger', true))->Voornaam ?? '-' }}
                            </td>
                            <td class="px-4 py-2 border text-center">
                                <a href="{{ route('manager.allergie.show', ['family' => $family->id, 'allergy_id' => request('allergy_id')]) }}">
                                    📄
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Home knop --}}
            <div class="mt-6 flex justify-end">
                <a href="{{ route('dashboard') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Home
                </a>
            </div>

        </div>
    </div>
@endsection
