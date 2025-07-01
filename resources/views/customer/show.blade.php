@extends('layouts.app')

@section('content')
    <div class="max-w-3xl mx-auto bg-white shadow p-6 mt-8 rounded">
        <h2 class="text-2xl font-semibold mb-4">Klantgegevens</h2>

        <p><strong>Naam Gezin:</strong> {{ $client->Naam }}</p>
        <p><strong>Vertegenwoordiger:</strong> {{ $client->representative->first()->Voornaam ?? '-' }}</p>
        <p><strong>E-mailadres:</strong> {{ $client->contact->first()->Email ?? '-' }}</p>
        <p><strong>Mobiel:</strong> {{ $client->contact->first()->Mobiel ?? '-' }}</p>
        <p><strong>Adres:</strong> {{ $client->contact->first()->Straat ?? '-' }} {{ $client->contact->first()->Huisnummer ?? '' }}</p>
        <p><strong>Woonplaats:</strong> {{ $client->contact->first()->Woonplaats ?? '-' }}</p>

        <a href="{{ route('clients.index') }}" class="inline-block mt-6 px-4 py-2 bg-blue-500 text-white rounded shadow hover:bg-blue-600">Terug naar overzicht</a>
    </div>
@endsection
