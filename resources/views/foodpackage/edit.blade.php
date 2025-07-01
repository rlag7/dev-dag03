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

    {{-- Foutmelding tonen als gezin niet actief is --}}
    @php
        $isActive = $pakket->family && $pakket->family->IsActief;
    @endphp

    @if(!$isActive)
        <div class="mb-6 p-4 bg-red-100 text-red-700 rounded">
            Dit gezin is niet meer ingeschreven bij de voedselbank en daarom kan er geen voedselpakket worden uitgereikt.
        </div>
    @endif

    <form method="POST" action="{{ route('manager.foodpackage.update', $pakket->id) }}">
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
        <fieldset disabled>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Pakket Nummer</label>
                <input type="text" value="{{ $pakket->PakketNummer }}" class="w-full border rounded px-3 py-2" />
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Datum Samenstelling</label>
                <input type="date" value="{{ optional($pakket->DatumSamenstelling)->format('Y-m-d') }}" class="w-full border rounded px-3 py-2" />
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Datum Uitgifte</label>
                <input type="date" value="{{ optional($pakket->DatumUitgifte)->format('Y-m-d') }}" class="w-full border rounded px-3 py-2" />
            </div>
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-1">Aantal Producten</label>
                <input type="number" value="{{ $pakket->AantalProducten ?? 0 }}" class="w-full border rounded px-3 py-2" />
            </div>
        </fieldset>

        {{-- Alleen Status aanpasbaar --}}
        <div class="mb-6">
            <label for="Status" class="block text-sm font-medium text-gray-700 mb-1">Status</label>
            <select
                id="Status"
                name="Status"
                class="w-full border rounded px-3 py-2"
                required
                {{ $isActive ? '' : 'disabled' }}
            >
                <option value="Uitgereikt" {{ $pakket->Status === 'Uitgereikt' ? 'selected' : '' }}>Uitgereikt</option>
                <option value="Niet uitgereikt" {{ $pakket->Status === 'Niet uitgereikt' ? 'selected' : '' }}>Niet uitgereikt</option>
            </select>
        </div>

        {{-- Wijzig status knop --}}
        <div class="mb-6">
            <button
                type="submit"
                class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700 transition"
                {{ $isActive ? '' : 'disabled' }}
            >
                Wijzig Status
            </button>
        </div>
    </form>

    {{-- Navigatie knoppen --}}
    <div class="flex justify-between">
        <a href="{{ route('manager.foodpackage.index') }}" class="bg-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-400">
            ← Terug
        </a>
        <a href="{{ route('dashboard') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Home
        </a>
    </div>

</div>
</body>
</html>
