<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Wijzig Klant</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-6 bg-gray-100">
<div class="w-full max-w-6xl mx-auto text-left">

    <!-- Titel -->
    <div class="flex justify-between items-center mb-6 flex-wrap gap-4">
        <h2 class="text-2xl font-semibold text-green-700 underline">
            Wijzig Klant Details - {{ $customer->representative->first()->Voornaam ?? '-' }} {{ $customer->representative->first()->Achternaam ?? '-' }}
        </h2>
    </div>

    <!-- Feedback -->
    @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded mb-4">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Formulier -->
    <form method="POST" action="{{ route('customers.update', $customer->id) }}" class="bg-white shadow-lg rounded p-6">
        @csrf
        @method('PUT')

        @php
            $rep = $customer->representative->first();
            $contact = $customer->contact->first();
        @endphp

        <div class="space-y-4">

            @foreach([
                ['label' => 'Voornaam', 'name' => 'Voornaam', 'value' => old('Voornaam', $rep->Voornaam ?? '')],
                ['label' => 'Tussenvoegsel', 'name' => 'Tussenvoegsel', 'value' => old('Tussenvoegsel', $rep->Tussenvoegsel ?? '')],
                ['label' => 'Achternaam', 'name' => 'Achternaam', 'value' => old('Achternaam', $rep->Achternaam ?? '')],
                ['label' => 'Geboortedatum', 'name' => 'Geboortedatum', 'type' => 'date', 'value' => old('Geboortedatum', $rep->Geboortedatum ?? '')],
                ['label' => 'Straat', 'name' => 'Straat', 'value' => old('Straat', $contact->Straat ?? '')],
                ['label' => 'Huisnummer', 'name' => 'Huisnummer', 'value' => old('Huisnummer', $contact->Huisnummer ?? '')],
                ['label' => 'Toevoeging', 'name' => 'Toevoeging', 'value' => old('Toevoeging', $contact->Toevoeging ?? '')],
                ['label' => 'Postcode', 'name' => 'Postcode', 'value' => old('Postcode', $contact->Postcode ?? '')],
                ['label' => 'Woonplaats', 'name' => 'Woonplaats', 'value' => old('Woonplaats', $contact->Woonplaats ?? '')],
                ['label' => 'E-mail', 'name' => 'Email', 'type' => 'email', 'value' => old('Email', $contact->Email ?? '')],
                ['label' => 'Mobiel', 'name' => 'Mobiel', 'value' => old('Mobiel', $contact->Mobiel ?? '')],
            ] as $field)
                <div class="flex items-start border-b pb-4">
                    <label class="w-1/2 font-bold py-2 pr-4">{{ $field['label'] }}</label>
                    <div class="w-1/2">
                        <input type="{{ $field['type'] ?? 'text' }}" name="{{ $field['name'] }}" value="{{ $field['value'] }}"
                               class="w-full border border-gray-300 rounded px-3 py-2 @error($field['name']) border-red-500 @enderror">
                        @error($field['name']) <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>
            @endforeach

            <!-- Readonly -->
            <div class="flex items-start border-b pb-4">
                <label class="w-1/2 font-bold py-2 pr-4">Type Persoon</label>
                <div class="w-1/2">
                    <input type="text" disabled
                           value="@if($rep->TypePersoon === 'manager') Manager @elseif($rep->TypePersoon === 'employee') Werknemer @elseif($rep->TypePersoon === 'volunteer') Vrijwilliger @else - @endif"
                           class="w-full bg-gray-100 border border-gray-300 rounded px-3 py-2 text-gray-700">
                    <input type="hidden" name="TypePersoon" value="{{ $rep->TypePersoon }}">
                </div>
            </div>

            <div class="flex items-start border-b pb-4">
                <label class="w-1/2 font-bold py-2 pr-4">Vertegenwoordiger</label>
                <div class="w-1/2">
                    <input type="text" disabled value="{{ $rep->IsVertegenwoordiger ? 'Ja' : 'Nee' }}"
                           class="w-full bg-gray-100 border border-gray-300 rounded px-3 py-2 text-gray-700">
                    <input type="hidden" name="IsVertegenwoordiger" value="{{ $rep->IsVertegenwoordiger }}">
                </div>
            </div>
        </div>

        <!-- Knoppen -->
        <div class="flex justify-between mt-6">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded transition shadow">
                Wijzig Klant Details
            </button>
            <div class="space-x-2">
                <a href="{{ route('customers.show', $customer->id) }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded transition">Terug</a>
                <a href="{{ route('dashboard') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded transition">Home</a>
            </div>
        </div>
    </form>
</div>
</body>
</html>
