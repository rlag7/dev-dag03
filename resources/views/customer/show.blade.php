<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Klantgegevens
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 text-gray-900 dark:text-gray-100">

                <p><strong>Naam Gezin:</strong> {{ $customer->Naam }}</p>
                <p><strong>Vertegenwoordiger:</strong> {{ $customer->representative->first()->Voornaam ?? '-' }}</p>
                <p><strong>E-mailadres:</strong> {{ $customer->contact->first()->Email ?? '-' }}</p>
                <p><strong>Mobiel:</strong> {{ $customer->contact->first()->Mobiel ?? '-' }}</p>
                <p><strong>Adres:</strong> {{ $customer->contact->first()->Straat ?? '-' }} {{ $customer->contact->first()->Huisnummer ?? '' }}</p>
                <p><strong>Woonplaats:</strong> {{ $customer->contact->first()->Woonplaats ?? '-' }}</p>

                <a href="{{ route('customers.index') }}" class="inline-block mt-6 px-4 py-2 bg-blue-500 text-white rounded shadow hover:bg-blue-600">
                    Terug naar overzicht
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
