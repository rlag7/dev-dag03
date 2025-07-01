<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Overzicht Producten</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-6 bg-gray-100">
<div class="w-full max-w-6xl mx-auto text-left">

    <h2 class="text-xl text-green-700 underline mb-4">
        <a href="#" class="hover:text-green-900">Overzicht producten</a>
    </h2>

    {{-- Leveranciergegevens --}}
    <table class="mb-6 border text-sm bg-white shadow">
        <tr>
            <td class="border px-4 py-2 font-semibold">Naam:</td>
            <td class="border px-4 py-2">{{ $supplier->Naam }}</td>
        </tr>
        <tr>
            <td class="border px-4 py-2 font-semibold">Leveranciernummer:</td>
            <td class="border px-4 py-2">{{ $supplier->LeverancierNummer }}</td>
        </tr>
        <tr>
            <td class="border px-4 py-2 font-semibold">Leveranciertype:</td>
            <td class="border px-4 py-2">{{ $supplier->LeverancierType }}</td>
        </tr>
    </table>

    {{-- Productenoverzicht --}}
    <div class="overflow-x-auto">
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
            @forelse($products as $product)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-2 border">{{ $product->Naam }}</td>
                    <td class="px-4 py-2 border">{{ $product->allergy->Naam ?? '-' }}</td>
                    <td class="px-4 py-2 border">{{ $product->Barcode }}</td>
                    <td class="px-4 py-2 border">{{ $product->pivot->DatumEerstVolgendeLevering ?? '-' }}</td>
                    <td class="px-4 py-2 border text-center">
                        <a href="{{ route('manager.supplier.product.edit', [$supplier->id, $product->id]) }}"
                           class="text-blue-600 hover:underline">
                            ✏️
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center bg-yellow-100 px-4 py-3 text-yellow-700">
                        Geen producten gekoppeld aan deze leverancier.
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4 text-right space-x-2">
        <a href="{{ url()->previous() }}"
           class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded transition">
            terug
        </a>
        <a href="{{ route('dashboard') }}"
           class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded transition">
            home
        </a>
    </div>

</div>
</body>
</html>
