<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Wijzig Product</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-6 bg-gray-100">
<div class="max-w-xl mx-auto bg-white p-6 rounded shadow">

    {{-- Titel --}}
    <h2 class="text-2xl font-semibold text-green-700 mb-4">
        Wijzig Product - {{ $product->Naam }}
    </h2>

    {{-- Feedbackbericht --}}
    @if(session('message'))
        <div class="mb-4 bg-yellow-100 text-yellow-800 px-4 py-2 rounded">
            {{ session('message') }}
        </div>
    @endif

    <form method="POST" action="{{ route('manager.product_supplier.update', [$supplier->id, $product->id]) }}">
        @csrf
        @method('PUT')

        {{-- Inline veld voor houdbaarheidsdatum --}}
        <div class="mb-6 flex items-center space-x-4">
            <label for="DatumEerstVolgendeLevering" class="text-sm font-semibold w-48">
                Houdbaarheidsdatum:
            </label>
            <input type="date" name="DatumEerstVolgendeLevering" id="DatumEerstVolgendeLevering"
                   value="{{ $product->pivot->DatumEerstVolgendeLevering }}"
                   class="border border-gray-300 rounded p-2 w-full" required>
        </div>

        {{-- Knoppenrij --}}
        <div class="mt-6 flex justify-between items-center">
            {{-- Linkerkant: wijzigknop --}}
            <button type="submit"
                    class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700 transition">
                Wijzig Houdbaarheidsdatum
            </button>

            {{-- Rechterkant: Terug + Home --}}
            <div class="flex space-x-4">
                <a href="{{ route('manager.supplier.show', $supplier->id) }}"
                   class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded transition">
                    Terug
                </a>

                <a href="{{ route('dashboard') }}"
                   class="bg-blue-600 hover:bg-gray-700 text-white px-4 py-2 rounded transition">
                    Home
                </a>
            </div>
        </div>
    </form>

</div>
</body>
</html>
