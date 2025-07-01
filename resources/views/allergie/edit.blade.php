@extends('layouts.app')

@section('content')
    <div class="mt-8 flex justify-center px-4">
        <div class="w-full max-w-md bg-white p-6 rounded shadow">

            <h1 class="text-xl font-semibold text-green-700 mb-6">
                Allergie bewerken
            </h1>

            <form method="POST" action="{{ route('manager.allergie.update', $allergy->id) }}">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="Naam" class="block font-medium mb-1">Naam</label>
                    <input type="text" id="Naam" name="Naam" value="{{ old('Naam', $allergy->Naam) }}" class="w-full border px-3 py-2 rounded" required>
                    @error('Naam')
                    <p class="text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="Omschrijving" class="block font-medium mb-1">Omschrijving</label>
                    <textarea id="Omschrijving" name="Omschrijving" rows="4" class="w-full border px-3 py-2 rounded">{{ old('Omschrijving', $allergy->Omschrijving) }}</textarea>
                    @error('Omschrijving')
                    <p class="text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Opslaan
                </button>

                <a href="{{ route('manager.allergie.index') }}" class="ml-4 text-gray-600 hover:underline">Annuleren</a>
            </form>

        </div>
    </div>
@endsection
