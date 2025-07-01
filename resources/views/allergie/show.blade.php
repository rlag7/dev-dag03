@extends('layouts.app')

@section('content')
    <div class="flex justify-center px-4">
        <div class="w-full max-w-3xl bg-white p-6 rounded shadow">

            <h1 class="text-xl font-bold text-green-700 mb-4">
                Allergieën voor gezin: {{ $family->Naam }} ({{ $family->Code }})
            </h1>

            @if ($family->people->isEmpty())
                <div class="text-gray-500">Er zijn geen personen gekoppeld aan dit gezin.</div>
            @else
                <ul class="space-y-4">
                    @foreach ($family->people as $person)
                        @php
                            $relevantAllergies = $person->allergies;
                            if ($allergyId) {
                                $relevantAllergies = $person->allergies->where('id', $allergyId);
                            }
                        @endphp

                        @if($relevantAllergies->isNotEmpty())
                            <li class="border-b pb-2">
                                <div class="font-semibold">{{ $person->Voornaam }} {{ $person->Tussenvoegsel }} {{ $person->Achternaam }}</div>
                                <ul class="list-disc list-inside text-sm text-gray-700 mt-1">
                                    @foreach ($relevantAllergies as $allergy)
                                        <li>{{ $allergy->Naam }} ({{ $allergy->AnafylactischRisico }})</li>
                                    @endforeach
                                </ul>
                            </li>
                        @endif
                    @endforeach
                </ul>
            @endif

            {{-- Terug knop --}}
            <div class="mt-6">
                <a href="{{ route('manager.allergie.index', ['allergy_id' => $allergyId]) }}" class="text-blue-600 hover:underline">
                    ← Terug naar overzicht
                </a>
            </div>
        </div>
    </div>
@endsection
