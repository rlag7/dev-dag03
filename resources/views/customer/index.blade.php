<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Overzicht Klanten</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-6 bg-gray-100">
<div class="w-full max-w-6xl mx-auto text-left">
    <h2 class="text-2xl font-semibold text-green-700 mb-4 underline">
        Overzicht Klanten
    </h2>

    <form method="POST" action="{{ route('clients.filter') }}"
          class="bg-white shadow-lg rounded p-4 relative">
        @csrf

        {{-- Form top right controls --}}
        <div class="flex justify-end items-center gap-2 mb-4">
            <select name="postcode" class="border border-gray-300 p-2 rounded">
                <option value="">Selecteer Postcode</option>
                @foreach($postcodes as $postcode)
                    <option value="{{ $postcode }}" {{ request('postcode') == $postcode ? 'selected' : '' }}>
                        {{ $postcode }}
                    </option>
                @endforeach
            </select>
            <button type="submit"
                    class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700 transition">
                Toon Klanten
            </button>
        </div>

        {{-- Feedbackmelding --}}
        @if(session('message'))
            <div class="bg-yellow-100 text-yellow-800 px-4 py-2 rounded mb-4">
                {{ session('message') }}
            </div>
        @endif

        {{-- Klantentabel --}}
        <div class="overflow-x-auto">
            <table class="min-w-full text-sm text-left border">
                <thead class="bg-gray-100 font-semibold">
                <tr>
                    <th class="px-4 py-2 border">Naam Gezin</th>
                    <th class="px-4 py-2 border">Vertegenwoordiger</th>
                    <th class="px-4 py-2 border">E-mailadres</th>
                    <th class="px-4 py-2 border">Mobiel</th>
                    <th class="px-4 py-2 border">Adres</th>
                    <th class="px-4 py-2 border">Woonplaats</th>
                    <th class="px-4 py-2 border">Klant Details</th>
                </tr>
                </thead>
                <tbody>
                @forelse($clients as $client)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2 border">{{ $client->Naam }}</td>
                        <td class="px-4 py-2 border">{{ $client->representative->first()->Voornaam ?? '-' }}</td>
                        <td class="px-4 py-2 border">{{ $client->contact->first()->Email ?? '-' }}</td>
                        <td class="px-4 py-2 border">{{ $client->contact->first()->Mobiel ?? '-' }}</td>
                        <td class="px-4 py-2 border">
                            {{ $client->contact->first()->Straat ?? '-' }}
                            {{ $client->contact->first()->Huisnummer ?? '' }}
                        </td>
                        <td class="px-4 py-2 border">{{ $client->contact->first()->Woonplaats ?? '-' }}</td>
                        <td class="px-4 py-2 border text-center">
                            <a href="{{ route('clients.show', $client->id) }}" class="text-blue-600 hover:underline">
                                📄
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-4 py-3 text-center bg-yellow-100 text-yellow-700">
                            Er zijn geen klanten bekent die de geselecteerde postcode hebben
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

        {{-- Home button bottom right --}}
        <div class="mt-4 text-right">
            <a href="{{ route('dashboard') }}"
               class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded transition">
                Home
            </a>
        </div>
    </form>
</div>
</body>
</html>
