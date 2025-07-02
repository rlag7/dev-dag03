@extends('layouts.app')

@section('content')
    <div class="max-w-xl mx-auto mt-10 p-6 bg-white rounded shadow">
        <h2 class="text-2xl font-semibold mb-6 text-green-700 underline">Wijzig allergie</h2>

        <form method="POST" action="{{ route('manager.allergie.update', $person->id) }}" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <select name="allergy_id" id="allergy_id" class="w-full border px-3 py-2 rounded">
                    @foreach ($allergies->unique('Naam') as $a)
                        <option value="{{ $a->id }}"
                                data-risico="{{ $a->AnafylactischRisico }}"
                            {{ $currentAllergy && $currentAllergy->id === $a->id ? 'selected' : '' }}>
                            {{ $a->Naam }}
                        </option>
                    @endforeach
                </select>
                @error('allergy_id')
                <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            @if(session('success'))
                <div x-data="{ show: true }"
                     x-init="setTimeout(() => show = false, 3000)"
                     x-show="show"
                     class="bg-green-100 text-green-800 px-4 py-2 rounded shadow transition">
                    De wijziging is doorgevoerd
                </div>
            @endif

            <div id="risicoAlert"
                 class="hidden bg-red-100 text-red-800 border border-red-300 px-4 py-3 rounded text-sm">
                Voor het wijzigen van deze allergie wordt geadviseerd eerst een arts te raadplegen
                vanwege een hoog risico op een anafylactisch shock.
            </div>

            <div class="flex justify-between mt-6">
                <button type="submit" class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">
                    Wijzig Allergie
                </button>
                <div class="flex gap-2">
                    <a href="{{ route('manager.allergie.show', ['family' => $person->family_id]) }}"
                       class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Terug</a>
                    <a href="{{ route('dashboard') }}"
                       class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Home</a>
                </div>
            </div>
        </form>

        {{--script voor warning message popup--}}
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const select = document.getElementById('allergy_id');
                const risicoAlert = document.getElementById('risicoAlert');

                function checkRisico() {
                    const selected = select.options[select.selectedIndex];
                    const risico = selected.getAttribute('data-risico');
                    risicoAlert.classList.toggle('hidden', risico !== 'Hoog');
                }

                select.addEventListener('change', checkRisico);
                checkRisico();
            });
        </script>
    </div>
@endsection
