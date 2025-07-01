<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-semibold text-green-700 underline">
            Wijzig Klant Details {{ $customer->representative->first()->Voornaam ?? '' }} {{ $customer->representative->first()->Achternaam ?? '' }}
        </h2>
    </x-slot>

    <div class="max-w-3xl mx-auto bg-white shadow-lg rounded p-6 mt-6">
        {{-- Success Message --}}
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        {{-- Error Message --}}
        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('customers.update', $customer->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            {{-- Voornaam --}}
            <div>
                <label class="font-bold block">Voornaam</label>
                <input type="text" name="Voornaam" value="{{ old('Voornaam', $customer->representative->first()->Voornaam ?? '') }}" class="w-full border rounded px-3 py-2">
            </div>

            {{-- Tussenvoegsel --}}
            <div>
                <label class="font-bold block">Tussenvoegsel</label>
                <input type="text" name="Tussenvoegsel" value="{{ old('Tussenvoegsel', $customer->representative->first()->Tussenvoegsel ?? '') }}" class="w-full border rounded px-3 py-2">
            </div>

            {{-- Achternaam --}}
            <div>
                <label class="font-bold block">Achternaam</label>
                <input type="text" name="Achternaam" value="{{ old('Achternaam', $customer->representative->first()->Achternaam ?? '') }}" class="w-full border rounded px-3 py-2">
            </div>

            {{-- Geboortedatum --}}
            <div>
                <label class="font-bold block">Geboortedatum</label>
                <input type="date" name="Geboortedatum" value="{{ old('Geboortedatum', $customer->representative->first()->Geboortedatum ?? '') }}" class="w-full border rounded px-3 py-2">
            </div>

            {{-- Type Persoon --}}
            <div>
                <label class="font-bold block">Type Persoon</label>
                <input type="text" name="TypePersoon" value="{{ old('TypePersoon', $customer->representative->first()->TypePersoon ?? '') }}" class="w-full border rounded px-3 py-2">
            </div>

            {{-- Vertegenwoordiger --}}
            <div>
                <label class="font-bold block">Vertegenwoordiger</label>
                <select name="IsVertegenwoordiger" class="w-full border rounded px-3 py-2">
                    <option value="1" {{ old('IsVertegenwoordiger', $customer->representative->first()->IsVertegenwoordiger ?? '') == 1 ? 'selected' : '' }}>Ja</option>
                    <option value="0" {{ old('IsVertegenwoordiger', $customer->representative->first()->IsVertegenwoordiger ?? '') == 0 ? 'selected' : '' }}>Nee</option>
                </select>
            </div>

            {{-- Straatnaam --}}
            <div>
                <label class="font-bold block">Straatnaam</label>
                <input type="text" name="Straat" value="{{ old('Straat', $customer->contact->first()->Straat ?? '') }}" class="w-full border rounded px-3 py-2">
            </div>

            {{-- Huisnummer --}}
            <div>
                <label class="font-bold block">Huisnummer</label>
                <input type="text" name="Huisnummer" value="{{ old('Huisnummer', $customer->contact->first()->Huisnummer ?? '') }}" class="w-full border rounded px-3 py-2">
            </div>

            {{-- Toevoeging --}}
            <div>
                <label class="font-bold block">Toevoeging</label>
                <input type="text" name="Toevoeging" value="{{ old('Toevoeging', $customer->contact->first()->Toevoeging ?? '') }}" class="w-full border rounded px-3 py-2">
            </div>

            {{-- Postcode --}}
            <div>
                <label class="font-bold block">Postcode</label>
                <input type="text" name="Postcode" value="{{ old('Postcode', $customer->contact->first()->Postcode ?? '') }}" class="w-full border rounded px-3 py-2 @error('Postcode') border-red-500 @enderror">
                @error('Postcode')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Woonplaats --}}
            <div>
                <label class="font-bold block">Woonplaats</label>
                <input type="text" name="Woonplaats" value="{{ old('Woonplaats', $customer->contact->first()->Woonplaats ?? '') }}" class="w-full border rounded px-3 py-2">
            </div>

            {{-- E-mail --}}
            <div>
                <label class="font-bold block">E-mail</label>
                <input type="email" name="Email" value="{{ old('Email', $customer->contact->first()->Email ?? '') }}" class="w-full border rounded px-3 py-2">
            </div>

            {{-- Mobiel --}}
            <div>
                <label class="font-bold block">Mobiel</label>
                <input type="text" name="Mobiel" value="{{ old('Mobiel', $customer->contact->first()->Mobiel ?? '') }}" class="w-full border rounded px-3 py-2">
            </div>

            {{-- Buttons --}}
            <div class="flex justify-between mt-6">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Wijzig Klant Details
                </button>
                <div class="space-x-2">
                    <a href="{{ route('customers.show', $customer->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">terug</a>
                    <a href="{{ route('dashboard') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">home</a>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
