@extends('layouts.app')

@section('content')
    <div class="max-w-6xl mx-auto mt-10 p-6 bg-white rounded shadow">
        <h2 class="text-2xl font-semibold mb-6 text-green-700">Allergieën in het gezin</h2>
        {{--Tabel boven de overzicht van show--}}
        <table class="mb-8 w-full text-sm">
            <tr>
                <td class="font-medium text-gray-700 w-48">Gezinsnaam:</td>
                <td>{{ $family->Naam }}</td>
            </tr>
            <tr>
                <td class="font-medium text-gray-700">Omschrijving:</td>
                <td>{{ $family->Omschrijving ?? '-' }}</td>
            </tr>
            <tr>
                <td class="font-medium text-gray-700">Totaal aantal Personen:</td>
                <td>{{ $family->TotaalAantalPersonen }}</td>
            </tr>
        </table>
       {{--main table van allergie--}}
        <div class="overflow-x-auto">
            <table class="min-w-full border border-gray-300 text-sm">
                <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="px-4 py-2 border">Naam</th>
                    <th class="px-4 py-2 border">Type Persoon</th>
                    <th class="px-4 py-2 border">Gezinsrol</th>
                    <th class="px-4 py-2 border">Allergie</th>
                    <th class="px-4 py-2 border text-center">Wijzig Allergie</th>
                </tr>
                </thead>
                <tbody>
                @foreach($people as $person)
                    <tr>
                        <td class="px-4 py-2 border">{{ $person->Voornaam }} {{ $person->Achternaam }}</td>
                        <td class="px-4 py-2 border">{{ $person->TypePersoon }}</td>
                        <td class="px-4 py-2 border">
                            {{ $person->IsVertegenwoordiger ? 'Vertegenwoordiger' : 'Leden' }}
                        </td>
                        <td class="px-4 py-2 border">
                            @if($person->allergies->isNotEmpty())
                                {{ $person->allergies->first()->Naam }}
                            @else
                                ---
                            @endif
                        </td>
                        <td class="px-4 py-2 border text-center">
                            <a href="{{ route('manager.allergie.edit', $person->id) }}" class="text-blue-600 hover:underline">&#9998;</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        {{--Home en terug knop--}}
        <div class="mt-6 flex justify-end gap-2">
            <a href="{{ route('manager.allergie.index') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Terug</a>
            <a href="{{ route('dashboard') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Home</a>
        </div>
    </div>
@endsection
