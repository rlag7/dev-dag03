<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Wijzig Klant Details: {{ $customer->representative->first()->Voornaam ?? '-' }}
        {{ $customer->representative->first()->Achternaam ?? '-' }}
    </title>
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Als er een success-melding is, refresh na 3s naar de show-route --}}
    @if(session('success'))
        <meta http-equiv="refresh" content="3;url={{ route('customers.show', $customer->id) }}">
    @endif
</head>
<body class="bg-gray-100 text-gray-900">

@php
    $rep = $customer->representative->first();
    $contact = $customer->contact->first();
@endphp

<div class="max-w-4xl mx-auto mt-10">
    <h2 class="text-2xl font-semibold text-blue-700 underline mb-4">
        Wijzig Klant Details {{ $rep->Voornaam ?? '-' }} {{ $rep->Achternaam ?? '-' }}
    </h2>

    {{-- Succes-melding in groene box --}}
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    {{-- Foutmelding --}}
    @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    {{-- Validatiefouten --}}
    @if($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded mb-4">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Formulier --}}
    <div class="bg-white shadow-md rounded p-6">
        <form method="POST" action="{{ route('customers.update', $customer->id) }}">
            @csrf
            @method('PUT')

            <div class="space-y-4">
                {{-- Voornaam --}}
                <div class="flex items-start border-b pb-4">
                    <label class="w-1/2 font-bold py-2 pr-4">Voornaam</label>
                    <div class="w-1/2">
                        <input type="text" name="Voornaam" value="{{ old('Voornaam', $rep->Voornaam ?? '') }}"
                               class="w-full border rounded px-3 py-2 @error('Voornaam') border-red-500 @enderror">
                        @error('Voornaam') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                {{-- Tussenvoegsel --}}
                <div class="flex items-start border-b pb-4">
                    <label class="w-1/2 font-bold py-2 pr-4">Tussenvoegsel</label>
                    <div class="w-1/2">
                        <input type="text" name="Tussenvoegsel" value="{{ old('Tussenvoegsel', $rep->Tussenvoegsel ?? '') }}"
                               class="w-full border rounded px-3 py-2 @error('Tussenvoegsel') border-red-500 @enderror">
                        @error('Tussenvoegsel') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                {{-- Achternaam --}}
                <div class="flex items-start border-b pb-4">
                    <label class="w-1/2 font-bold py-2 pr-4">Achternaam</label>
                    <div class="w-1/2">
                        <input type="text" name="Achternaam" value="{{ old('Achternaam', $rep->Achternaam ?? '') }}"
                               class="w-full border rounded px-3 py-2 @error('Achternaam') border-red-500 @enderror">
                        @error('Achternaam') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                {{-- Geboortedatum --}}
                <div class="flex items-start border-b pb-4">
                    <label class="w-1/2 font-bold py-2 pr-4">Geboortedatum</label>
                    <div class="w-1/2">
                        <input type="date" name="Geboortedatum" value="{{ old('Geboortedatum', $rep->Geboortedatum ?? '') }}"
                               class="w-full border rounded px-3 py-2 @error('Geboortedatum') border-red-500 @enderror">
                        @error('Geboortedatum') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                {{-- Type Persoon --}}
                <div class="flex items-start border-b pb-4">
                    <label class="w-1/2 font-bold py-2 pr-4">Type Persoon</label>
                    <div class="w-1/2">
                        <input type="text" disabled
                               value="{{ $customer->representative->first()->TypePersoon ?? '-' }}"
                               class="w-full bg-gray-100 border rounded px-3 py-2 text-gray-700">
                        <input type="hidden" name="TypePersoon" value="{{ $rep->TypePersoon }}">
                    </div>
                </div>

                {{-- Vertegenwoordiger --}}
                <div class="flex items-start border-b pb-4">
                    <label class="w-1/2 font-bold py-2 pr-4">Vertegenwoordiger</label>
                    <div class="w-1/2">
                        <input type="text" disabled value="{{ $rep->IsVertegenwoordiger ? 'Ja' : 'Nee' }}"
                               class="w-full bg-gray-100 border rounded px-3 py-2 text-gray-700">
                        <input type="hidden" name="IsVertegenwoordiger" value="{{ $rep->IsVertegenwoordiger }}">
                    </div>
                </div>

                {{-- Straatnaam --}}
                <div class="flex items-start border-b pb-4">
                    <label class="w-1/2 font-bold py-2 pr-4">Straatnaam</label>
                    <div class="w-1/2">
                        <input type="text" name="Straat" value="{{ old('Straat', $contact->Straat ?? '') }}"
                               class="w-full border rounded px-3 py-2 @error('Straat') border-red-500 @enderror">
                        @error('Straat') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                {{-- Huisnummer --}}
                <div class="flex items-start border-b pb-4">
                    <label class="w-1/2 font-bold py-2 pr-4">Huisnummer</label>
                    <div class="w-1/2">
                        <input type="text" name="Huisnummer" value="{{ old('Huisnummer', $contact->Huisnummer ?? '') }}"
                               class="w-full border rounded px-3 py-2 @error('Huisnummer') border-red-500 @enderror">
                        @error('Huisnummer') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                {{-- Toevoeging --}}
                <div class="flex items-start border-b pb-4">
                    <label class="w-1/2 font-bold py-2 pr-4">Toevoeging</label>
                    <div class="w-1/2">
                        <input type="text" name="Toevoeging" value="{{ old('Toevoeging', $contact->Toevoeging ?? '') }}"
                               class="w-full border rounded px-3 py-2 @error('Toevoeging') border-red-500 @enderror">
                        @error('Toevoeging') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                {{-- Postcode --}}
                <div class="flex items-start border-b pb-4">
                    <label class="w-1/2 font-bold py-2 pr-4">Postcode</label>
                    <div class="w-1/2">
                        <input type="text" name="Postcode" value="{{ old('Postcode', $contact->Postcode ?? '') }}"
                               class="w-full border rounded px-3 py-2 @error('Postcode') border-red-500 @enderror">
                        @error('Postcode') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                {{-- Woonplaats --}}
                <div class="flex items-start border-b pb-4">
                    <label class="w-1/2 font-bold py-2 pr-4">Woonplaats</label>
                    <div class="w-1/2">
                        <input type="text" name="Woonplaats" value="{{ old('Woonplaats', $contact->Woonplaats ?? '') }}"
                               class="w-full border rounded px-3 py-2 @error('Woonplaats') border-red-500 @enderror">
                        @error('Woonplaats') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                {{-- E-mail --}}
                <div class="flex items-start border-b pb-4">
                    <label class="w-1/2 font-bold py-2 pr-4">E-mail</label>
                    <div class="w-1/2">
                        <input type="email" name="Email" value="{{ old('Email', $contact->Email ?? '') }}"
                               class="w-full border rounded px-3 py-2 @error('Email') border-red-500 @enderror">
                        @error('Email') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                {{-- Mobiel --}}
                <div class="flex items-start border-b pb-4">
                    <label class="w-1/2 font-bold py-2 pr-4">Mobiel</label>
                    <div class="w-1/2">
                        <input type="text" name="Mobiel" value="{{ old('Mobiel', $contact->Mobiel ?? '') }}"
                               class="w-full border rounded px-3 py-2 @error('Mobiel') border-red-500 @enderror">
                        @error('Mobiel') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>
            </div>

            {{-- Actieknoppen --}}
            <div class="flex justify-between mt-6">
                <button type="submit"
                        class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 shadow">
                    Wijzig Klant Details
                </button>
                <div class="space-x-2">
                    <a href="{{ route('customers.show', $customer->id) }}"
                       class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-gray-700">Terug</a>
                    <a href="{{ route('dashboard') }}"
                       class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-gray-700">Home</a>
                </div>
            </div>

        </form>
    </div>
</div>

</body>
</html>
