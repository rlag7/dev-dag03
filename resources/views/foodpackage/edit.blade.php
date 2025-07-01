<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Edit Pakket</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-6 bg-gray-100">
<div class="max-w-3xl mx-auto bg-white p-6 rounded shadow">

    <h2 class="text-2xl font-semibold text-green-700 underline mb-6">Pakket Wijzigen</h2>

    <form method="POST" action="{{ route('foodpackage.update', $pakket->id) }}">
        @csrf
        @method('PUT')

        {{-- Gezin details --}}
        <fieldset disabled>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Naam</label>
                <input type="text" value="{{ $pakket->family->Naam }}" class="w-full border rounded px-3 py-2" />
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Omschrijving</label>
                <input type="text" value="{{ $pakket->family->Omschrijving ?? '-' }}" class="w-full border rounded px-3 py-2" />
            </div>
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-1">Totaal aantal personen</label>
                <input type="text" value="{{ $pakket->family->TotaalAantalPersonen }}" class="w-full border rounded px-3 py-2" />
            </div>
        </fieldset>

        {{-- Pakket details --}}
        <div class="mb-4">
            <label for="PakketNummer" class="block text-sm font-medium text-gray-700 mb-1">Pakket Nummer</label>
            <input id="PakketNummer" name="PakketNummer" type="text" value="{{ old('PakketNummer', $pakket->PakketNummer) }}" class="w-full border rounded px-3 py-2" required />
        </div>

        <div class="mb-4">
            <label for="DatumSamenstelling" class="block text-sm font-medium text-gray-700 mb-1">Datum Samenstelling</label>
            <input id="DatumSamenstelling" name="DatumSamenstelling" type="date" value="{{ old('DatumSamenstelling', optional($pakket->DatumSamenstelling)->format('Y-m-d')) }}" class="w-full border rounded px-3 py-2" required />
        </div>

        <div class="mb-4">
            <label for="DatumUitgifte" class="block text-sm font-medium text-gray-700 mb-1">Datum Uitgifte</label>
            <input id="DatumUitgifte" name="DatumUitgifte" type="date" value="{{ old('DatumUitgifte', optional($pakket->DatumUitgifte)->format('Y-m-d')) }}" class="w-full border rounded px-3 py-2" />
        </div>

        <div class="mb-4">
            <label for="Status" class="block text-sm font-medium text-gray-700 mb-1">Status</label>
            <input id="Status" name="Status" type="text" value="{{ old('Status', $pakket->Status) }}" class="w-full border rounded px-3 py-2" />
        </div>

        <div class="mb-6">
            <label for="AantalProducten" class="block text-sm font-medium text-gray-700 mb-1">Aantal Producten</label>
            <input id="AantalProducten" name="AantalProducten" type="number" min="0" value="{{ old('AantalProducten', $pakket->AantalProducten ?? 0) }}" class="w-full border rounded px-3 py-2" />
        </div>

        {{-- Wijzig status knop --}}
        <div class="mb-6">
            <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700 transition">
                Wijzig Status
            </button>
        </div>
    </form>

    {{-- Navigatie knoppen --}}
    <div class="flex justify-between">
        <a href="{{ url()->previous() }}" class="bg-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-400">
            ← Terug
        </a>
        <a href="{{ route('dashboard') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Home
        </a>
    </div>

</div>
</body>
</html>
