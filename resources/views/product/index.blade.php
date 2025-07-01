<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Alle Producten</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-6 bg-gray-100">
<div class="w-full max-w-6xl mx-auto text-left">

    <h2 class="text-2xl font-semibold text-green-700 mb-4 underline">Overzicht Alle Producten</h2>

    <table class="min-w-full text-sm text-left border bg-white shadow">
        <thead class="bg-gray-100 font-semibold">
        <tr>
            <th class="px-4 py-2 border">Naam</th>
            <th class="px-4 py-2 border">Soort Allergie</th>
            <th class="px-4 py-2 border">Barcode</th>
            <th class="px-4 py-2 border">Houdbaarheidsdatum</th>
            <th class="px-4 py-2 border text-center">Wijzig Product</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($products as $product)
            @foreach ($product->suppliers as $supplier)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-2 border">{{ $product->Naam }}</td>
                    <td class="px-4 py-2 border">{{ $product->SoortAllergie ?? '-' }}</td>
                    <td class="px-4 py-2 border">{{ $product->Barcode }}</td>
                    <td class="px-4 py-2 border">
                        {{ $supplier->pivot->DatumEerstVolgendeLevering ?? '-' }}
                    </td>
                    <td class="px-4 py-2 border text-center">
                        <a href="{{ route('manager.supplier.product.edit', [$supplier->id, $product->id]) }}"
                           class="text-blue-600 hover:underline">
                            ✏️
                        </a>
                    </td>
                </tr>
            @endforeach
        @empty
            <tr>
                <td colspan="5" class="text-center px-4 py-3 text-yellow-700 bg-yellow-100">
                    Geen producten beschikbaar.
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>

    <div class="mt-4 text-right">
        <a href="{{ route('dashboard') }}"
           class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded transition">
            Home
        </a>
    </div>

</div>
</body>
</html>
