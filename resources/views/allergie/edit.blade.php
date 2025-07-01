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

                <div class="mb-6">
                    <label for="Naam" class="block font-medium mb-1">Allergie</label>
                    <select id="Naam" name="Naam" class="w-full border border-gray-300 px-3 py-2 rounded" required>
                        <option value="">-- Selecteer een allergie --</option>
                        @foreach ($allergies as $a)
                            <option value="{{ $a->Naam }}" {{ (old('Naam', $allergy->Naam) === $a->Naam) ? 'selected' : '' }}>
                                {{ $a->Naam }}
                            </option>
                        @endforeach
                    </select>
                    @error('Naam')
                    <p class="text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-between items-center">
                    <button type="submit" class="bg-gray-500 text-white px-6 py-2 rounded bg-gray-500 ">
                        Wijzig Allergie
                    </button>

                    <div class="flex gap-3">
                        <a href="{{ url()->previous() }}" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">
                            Terug
                        </a>
                        <a href="{{ route('dashboard') }}" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">
                            Home
                        </a>
                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection
