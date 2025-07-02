<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Wijzig Product</title>
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Redirect na succesvolle wijziging --}}
    @if(session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const countdownEl = document.getElementById('countdown');
                let seconds = 3;
                const interval = setInterval(() => {
                    countdownEl.textContent = seconds;
                    seconds--;

                    if (seconds < 0) {
                        clearInterval(interval);
                        window.location.href = "{{ route('manager.supplier.show', $supplier->id) }}";
                    }
                }, 1000);
            });
        </script>
    @endif
</head>
<body class="p-6 bg-gray-100">

<div class="max-w-xl mx-auto bg-white p-6 rounded shadow">

    {{-- Titel --}}
    <h2 class="text-2xl font-semibold text-green-700 mb-4">
        Wijzig Product - {{ $product->Naam }}
    </h2>

    {{-- Succesmelding --}}
    @if(session('message') && session('success'))
        <div class="mb-4 bg-green-100 text-green-800 px-4 py-2 rounded">
            {{ session('message') }}
            <p class="mt-2 text-sm">Je wordt over <span id="countdown">3</span> seconden teruggestuurd naar de productpagina.</p>
        </div>
    @endif

    {{-- Algemene foutmelding boven het veld --}}
    @if(session('errorHeader'))
        <div class="mb-4 bg-red-100 text-red-800 px-4 py-2 rounded">
            {{ session('errorHeader') }}
        </div>
    @endif

    <form method="POST" action="{{ route('manager.product_supplier.update', [$supplier->id, $product->id]) }}">
        @csrf
        @method('PUT')

        {{-- Houdbaarheidsdatum veld + foutmelding --}}
        <div class="mb-6">
            <div class="flex items-center space-x-4">
                <label for="DatumEerstVolgendeLevering" class="text-sm font-semibold w-48">
                    Houdbaarheidsdatum:
                </label>
                <input type="date"
                       name="DatumEerstVolgendeLevering"
                       id="DatumEerstVolgendeLevering"
                       min="2024-01-01"
                       value="{{ old('DatumEerstVolgendeLevering', $product->pivot->DatumEerstVolgendeLevering) }}"
                       class="border border-gray-300 rounded p-2 w-full"
                       required>
            </div>

            {{-- Inline foutmelding onder veld --}}
            @error('DatumEerstVolgendeLevering')
            <p class="text-red-600 text-sm mt-2 ml-48">{{ $message }}</p>
            @enderror
        </div>

        {{-- Knoppenrij --}}
        <div class="mt-6 flex justify-between items-center">
            <button type="submit"
                    class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700 transition">
                Wijzig Houdbaarheidsdatum
            </button>

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
