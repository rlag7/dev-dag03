<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-semibold text-green-700 underline">
            Klant Details {{ $customer->representative->first()->Voornaam ?? '-' }} {{ $customer->representative->first()->Achternaam ?? '-' }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow border border-gray-200 rounded-lg p-6">

                @php
                    $rep = $customer->representative->first();
                    $contact = $customer->contact->first();
                @endphp

                @if(!$rep && !$contact)
                    <p class="text-red-600">⚠️ Geen klantgegevens gevonden.</p>
                @else
                    <table class="table-auto w-full text-left border border-collapse">
                        <tbody>
                        <tr>
                            <th class="font-medium px-4 py-2 border">Voornaam</th>
                            <td class="px-4 py-2 border">{{ $rep->Voornaam ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th class="font-medium px-4 py-2 border">Tussenvoegsel</th>
                            <td class="px-4 py-2 border">{{ $rep->Tussenvoegsel ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th class="font-medium px-4 py-2 border">Achternaam</th>
                            <td class="px-4 py-2 border">{{ $rep->Achternaam ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th class="font-medium px-4 py-2 border">Geboortedatum</th>
                            <td class="px-4 py-2 border">{{ $rep->Geboortedatum ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th class="font-medium px-4 py-2 border">TypePersoon</th>
                            <td class="px-4 py-2 border">{{ $rep->TypePersoon ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th class="font-medium px-4 py-2 border">Vertegenwoordiger</th>
                            <td class="px-4 py-2 border">{{ isset($rep->IsVertegenwoordiger) ? ($rep->IsVertegenwoordiger ? 'Ja' : 'Nee') : '-' }}</td>
                        </tr>
                        <tr>
                            <th class="font-medium px-4 py-2 border">Straatnaam</th>
                            <td class="px-4 py-2 border">{{ $contact->Straat ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th class="font-medium px-4 py-2 border">Huisnummer</th>
                            <td class="px-4 py-2 border">{{ $contact->Huisnummer ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th class="font-medium px-4 py-2 border">Toevoeging</th>
                            <td class="px-4 py-2 border">{{ $contact->Toevoeging ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th class="font-medium px-4 py-2 border">Postcode</th>
                            <td class="px-4 py-2 border">{{ $contact->Postcode ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th class="font-medium px-4 py-2 border">Woonplaats</th>
                            <td class="px-4 py-2 border">{{ $contact->Woonplaats ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th class="font-medium px-4 py-2 border">Email</th>
                            <td class="px-4 py-2 border">{{ $contact->Email ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th class="font-medium px-4 py-2 border">Mobiel</th>
                            <td class="px-4 py-2 border">{{ $contact->Mobiel ?? '-' }}</td>
                        </tr>
                        </tbody>
                    </table>
                @endif

                <div class="flex justify-between mt-6">
                    <a href="{{ route('customers.edit', $customer->id) }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Wijzig</a>
                    <div class="space-x-2">
                        <a href="{{ route('customers.index') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Terug</a>
                        <a href="{{ route('dashboard') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Home</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
