@php
    use Illuminate\Support\Facades\Auth;
    $user = Auth::user();
    $role = $user->roles->pluck('name')->first();
@endphp

    <!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Homepage Voedselbank Maaskantje</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-black">
<div class="max-w-4xl mx-auto p-6">

    {{-- Titel gecentreerd --}}
    <h1 class="text-3xl font-bold text-center mb-6">
        Homepage Voedselbank Maaskantje
    </h1>

    {{-- Inline blauwe links per rol --}}
    <div class="flex flex-wrap justify-center gap-6 text-lg mb-8">
        @if ($user->hasRole('admin'))
            <a href="{{ route('admin.users.index') }}" class="text-blue-600 hover:underline">Gebruikers</a>

        @elseif ($user->hasRole('manager'))
            <a href="{{ route('manager.allergie.index') }}" class="text-blue-600 hover:underline">Allergie Overzicht</a>
            <a href="{{ route('manager.customers.index') }}" class="text-blue-600 hover:underline">Klant Overzicht</a>
            <a href="{{ route('manager.foodpackage.index') }}" class="text-blue-600 hover:underline">Voedselpakket Overzicht</a>
            <a href="{{ route('manager.supplier.index') }}" class="text-blue-600 hover:underline">Leverancier Overzicht</a>

        @elseif ($user->hasRole('employee'))
            <a href="{{ route('employee.customers.index') }}" class="text-blue-600 hover:underline">Klant Overzicht</a>
            <a href="{{ route('employee.supplier.index') }}" class="text-blue-600 hover:underline">Leverancier Overzicht</a>

        @elseif ($user->hasRole('volunteer'))
            <a href="{{ route('volunteer.customers.index') }}" class="text-blue-600 hover:underline">Klant Overzicht</a>
            <a href="{{ route('volunteer.foodpackage.index') }}" class="text-blue-600 hover:underline">Voedselpakket Overzicht</a>
        @endif
    </div>

    {{-- Logout --}}
    <div class="text-center">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="text-red-600 hover:underline text-base">
                Logout
            </button>
        </form>
    </div>

</div>
</body>
</html>
