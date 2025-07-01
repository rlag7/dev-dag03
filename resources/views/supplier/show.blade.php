<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Leverancier Details</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-6 bg-gray-100">
<div class="w-full max-w-6xl mx-auto text-left">

    {{-- Titel --}}
    <h2 class="text-2xl font-semibold text-green-700 underline mb-6">
        Overzicht Producten
    </h2>

    {{-- Flex container voor de eerste tabel --}}
    <div class="flex mb-8">
        <div class="w-1/3">
            <table class="w-full text-sm text-left border bg-white rounded shadow">
                <tbody>
                <tr>
                    <th class="px-4 py-2 border bg-gray-100">Naam</th>
                    <td class="px-4 py-2 border">{{ $supplier->Naam }}</td>
                </tr>
                <tr>
                    <th class="px-4 py-2 border bg-gray-100">Leveranciernummer</th>
                    <td class="px-4 py-2 border">{{ $supplier->LeverancierNummer }}</td>
                </tr>
                <tr>
                    <th class="px-4 py-2 border bg-gray-100">Leverancierstype</th>
                    <td class="px-4 py-2 border">{{ $supplier->LeverancierType }}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

    {{-- Tweede tabel: Producten van deze leverancier --}}
    <h3 class="text-xl font-semibold mb-2">Producten</h3>
    <div class="overflow-x-auto">
        <table class="min-w-full text-sm text-left border bg-white rounded shadow">
            <thead class="bg-gray-100 font-semibold">
            <tr>
                <th class="px-4 py-2 border">Naam</th>
                <th class="px-4 py-2 border">Soort Allergie</th>
                <th class="px-4 py-2 border">Barcode</th>
                <th class="px-4 py-2 border">Houdbaarheidsdatum</th>
                <th class="px-4 py-2 border text-center">Wijzig</th>
            </tr>
            </thead>
            <tbody>
            @forelse($supplier->products as $product)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-2 border">{{ $product->Naam }}</td>
                    <td class="px-4 py-2 border">{{ $product->SoortAllergie ?? '-' }}</td>
                    <td class="px-4 py-2 border">{{ $product->Barcode ?? '-' }}</td>
                    <td class="px-4 py-2 border">
                        {{ $product->pivot->DatumEerstVolgendeLevering ?? 'Onbekend' }}
                    </td>
                    <td class="px-4 py-2 border text-center">
                        <a href="{{ route('manager.product_supplier.edit', [$supplier->id, $product->id]) }}"
                           class="text-blue-600 hover:underline">✏️</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="px-4 py-3 text-center bg-yellow-100 text-yellow-700">
                        Geen producten gekoppeld aan deze leverancier.
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6 flex justify-end space-x-4">
        <a href="{{ route('manager.supplier.index') }}"
           class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded transition">
            Terug
        </a>

        <a href="{{ route('dashboard') }}"
           class="bg-blue-600 hover:bg-gray-700 text-white px-4 py-2 rounded transition">
            Home
        </a>
    </div>


</div>
</body>
</html>
