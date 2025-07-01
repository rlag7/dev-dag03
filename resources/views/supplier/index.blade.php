<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Overzicht Leveranciers</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-6 bg-gray-100">
<div class="w-full max-w-6xl mx-auto text-left">

    <form method="POST" action="{{ route('manager.supplier.filter') }}"
          class="bg-white shadow-lg rounded p-4 relative">
        @csrf

        {{-- Titel + filters inline maar gescheiden --}}
        <div class="flex justify-between items-center mb-4 flex-wrap gap-4">
            <h2 class="text-2xl font-semibold text-green-700 underline">
                Overzicht Leveranciers
            </h2>

            <div class="flex items-center gap-2">
                <select name="LeverancierType" class="border border-gray-300 p-2 rounded">
                    <option value="">Selecteer Leverancier Type</option>
                    @foreach($types as $type)
                        <option value="{{ $type }}" {{ request('LeverancierType') == $type ? 'selected' : '' }}>
                            {{ $type }}
                        </option>
                    @endforeach
                </select>
                <button type="submit"
                        class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700 transition">
                    Toon Leveranciers
                </button>
            </div>
        </div>

        @if(isset($message))
            <div class="bg-yellow-100 text-yellow-800 px-4 py-2 rounded mb-4">
                {{ $message }}
            </div>
        @endif

        <div class="overflow-x-auto">
            <table class="min-w-full text-sm text-left border">
                <thead class="bg-gray-100 font-semibold">
                <tr>
                    <th class="px-4 py-2 border">Naam</th>
                    <th class="px-4 py-2 border">Contactpersoon</th>
                    <th class="px-4 py-2 border">E-mailadres</th>
                    <th class="px-4 py-2 border">Mobiel</th>
                    <th class="px-4 py-2 border">Leveranciernummer</th>
                    <th class="px-4 py-2 border">LeverancierType</th>
                    <th class="px-4 py-2 border text-center">Product Details</th>
                </tr>
                </thead>
                <tbody>
                @forelse($suppliers as $supplier)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2 border">{{ $supplier->Naam }}</td>
                        <td class="px-4 py-2 border">{{ $supplier->ContactPersoon }}</td>
                        <td class="px-4 py-2 border">{{ $supplier->contacts->first()->Email ?? '-' }}</td>
                        <td class="px-4 py-2 border">{{ $supplier->contacts->first()->Mobiel ?? '-' }}</td>
                        <td class="px-4 py-2 border">{{ $supplier->LeverancierNummer }}</td>
                        <td class="px-4 py-2 border">{{ $supplier->LeverancierType }}</td>
                        <td class="px-4 py-2 border text-center">
                            <a href="{{ route('manager.supplier.show', $supplier->id) }}" class="text-blue-600 hover:underline">
                                📄
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-4 py-3 text-center bg-yellow-100 text-yellow-700">
                            Geen leveranciers gevonden voor het geselecteerde type.
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

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
