@extends('layouts.app')

@section('content')
    <div class="mt-8 flex justify-center px-4">
        <div class="w-full max-w-screen-md bg-white p-6 rounded shadow">

            <h1 class="text-xl font-semibold text-green-700 mb-6">Allergieën in het gezin</h1>

            {{-- Gezin info --}}
            <table class="w-full mb-6 text-sm border border-gray-300">
                <tbody>
                <tr class="border-b">
                    <td class="font-semibold px-4 py-2 w-1/3 bg-gray-100">Gezinsnaam:</td>
                    <td class="px-4 py-2">{{ $family->Naam }}</td>
                </tr>
                <tr class="border-b">
                    <td class="font-semibold px-4 py-2 bg-gray-100">Omschrijving:</td>
                    <td class="px-4 py-2">{{ $family->Omschrijving ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="font-semibold px-4 py-2 bg-gray-100">Totaal aantal Personen:</td>
                    <td class="px-4 py-2">{{ $family->TotaalAantalPersonen }}</td>
                </tr>
                </tbody>
            </table>

            {{-- Personen en allergieën --}}
            <div class="overflow-x-auto bg-white border border-gray-300 rounded">
                <table class="min-w-full text-sm text-left">
                    <thead class="bg-gray-100 text-gray-700">
                    <tr>
                        <th class="px-4 py-2 border">Naam</th>
                        <th class="px-4 py-2 border">Type Persoon</th>
                        <th class="px-4 py-2 border">Gezinsrol</th>
                        <th class="px-4 py-2 border">Allergie</th>
                        <th class="px-4 py-2 border">Wijzig Allergie</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $foundAny = false; @endphp
                    @foreach ($family->people as $person)
                        @php
                            $relevantAllergies = $allergyId
                              ? $person->allergies->where('id', (int) $allergyId)
                              : $person->allergies;
                        @endphp

                        @if ($relevantAllergies->isNotEmpty())
                            @php $foundAny = true; @endphp
                            <tr class="border-t">
                                <td class="px-4 py-2 border">{{ $person->Voornaam }} {{ $person->Tussenvoegsel }} {{ $person->Achternaam }}</td>
                                <td class="px-4 py-2 border">{{ $person->TypePersoon }}</td>
                                <td class="px-4 py-2 border">{{ $person->IsVertegenwoordiger ? 'Vertegenwoordiger' : '-' }}</td>
                                <td class="px-4 py-2 border">
                                    @foreach ($relevantAllergies as $allergy)
                                        {{ $allergy->Naam }}@if (!$loop->last), @endif
                                    @endforeach
                                </td>
                                <td class="px-4 py-2 border text-center">
                                    <a href="{{ route('manager.allergie.edit', $allergy->id) }}" class="text-blue-600 hover:underline">✎</a>
                                </td>
                            </tr>
                        @endif
                    @endforeach

                    @unless ($foundAny)
                        <tr>
                            <td colspan="5" class="px-4 py-6 text-center text-gray-500">Geen personen met deze allergie gevonden.</td>
                        </tr>
                    @endunless
                    </tbody>
                </table>
            </div>

            {{-- Navigatie --}}
            <div class="mt-6 flex justify-end gap-2">
                <a href="{{ url()->previous() }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">terug</a>
                <a href="{{ route('dashboard') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">home</a>
            </div>

        </div>
    </div>
@endsection
