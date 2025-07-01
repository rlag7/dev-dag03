<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-semibold text-green-700 underline">
            Klant Details {{ $customer->representative->first()->Voornaam ?? '' }} {{ $customer->representative->first()->Achternaam ?? '' }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow border border-gray-200 rounded-lg p-6">
                <table class="table-auto w-full text-left border border-collapse">
                    <tbody>
                    <tr><th class="font-medium px-4 py-2 border">Voornaam</th><td class="px-4 py-2 border">{{ $customer->representative->first()->Voornaam ?? '-' }}</td></tr>
                    <tr><th class="font-medium px-4 py-2 border">Tussenvoegsel</th><td class="px-4 py-2 border">{{ $customer->representative->first()->Tussenvoegsel ?? '-' }}</td></tr>
                    <tr><th class="font-medium px-4 py-2 border">Achternaam</th><td class="px-4 py-2 border">{{ $customer->representative->first()->Achternaam ?? '-' }}</td></tr>
                    <tr><th class="font-medium px-4 py-2 border">Geboortedatum</th><td class="px-4 py-2 border">{{ $customer->representative->first()->Geboortedatum ?? '-' }}</td></tr>
                    <tr><th class="font-medium px-4 py-2 border">TypePersoon</th><td class="px-4 py-2 border">{{ $customer->representative->first()->TypePersoon ?? '-' }}</td></tr>
                    <tr><th class="font-medium px-4 py-2 border">Vertegenwoordiger</th><td class="px-4 py-2 border">{{ $customer->representative->first()->IsVertegenwoordiger ? 'Ja' : 'Nee' }}</td></tr>
                    <tr><th class="font-medium px-4 py-2 border">Straatnaam</th><td class="px-4 py-2 border">{{ $customer->contact->first()->Straat ?? '-' }}</td></tr>
                    <tr><th class="font-medium px-4 py-2 border">Huisnummer</th><td class="px-4 py-2 border">{{ $customer->contact->first()->Huisnummer ?? '-' }}</td></tr>
                    <tr><th class="font-medium px-4 py-2 border">Toevoeging</th><td class="px-4 py-2 border">{{ $customer->contact->first()->Toevoeging ?? '-' }}</td></tr>
                    <tr><th class="font-medium px-4 py-2 border">Postcode</th><td class="px-4 py-2 border">{{ $customer->contact->first()->Postcode ?? '-' }}</td></tr>
                    <tr><th class="font-medium px-4 py-2 border">Woonplaats</th><td class="px-4 py-2 border">{{ $customer->contact->first()->Woonplaats ?? '-' }}</td></tr>
                    <tr><th class="font-medium px-4 py-2 border">Email</th><td class="px-4 py-2 border">{{ $customer->contact->first()->Email ?? '-' }}</td></tr>
                    <tr><th class="font-medium px-4 py-2 border">Mobiel</th><td class="px-4 py-2 border">{{ $customer->contact->first()->Mobiel ?? '-' }}</td></tr>
                    </tbody>
                </table>

                <div class="flex justify-between mt-6">
                    <a href="{{ route('customers.edit', $customer->id) }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Wijzig</a>
                    <div class="space-x-2">
                        <a href="{{ route('customers.index') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">terug</a>
                        <a href="{{ route('dashboard') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
