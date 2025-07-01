<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Welkom</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-black min-h-screen py-12 px-6">

<div class="max-w-4xl mx-auto">
    <h1 class="text-3xl font-bold text-green-700 underline mb-8">Welkom bij Voedselbank Maaskantje</h1>

    <p class="mb-6 text-gray-700">Gebruik onderstaande demo accounts om in te loggen:</p>

    <table class="w-full bg-white rounded shadow overflow-hidden text-sm">
        <thead class="bg-gray-200">
        <tr>
            <th class="text-left px-4 py-2">Naam</th>
            <th class="text-left px-4 py-2">E-mailadres</th>
            <th class="text-left px-4 py-2">Rol</th>
            <th class="text-left px-4 py-2">Wachtwoord</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr class="border-t hover:bg-gray-50">
                <td class="px-4 py-2">{{ $user->name }}</td>
                <td class="px-4 py-2">{{ $user->email }}</td>
                <td class="px-4 py-2">
                    {{ $user->roles->pluck('name')->join(', ') ?: '-' }}
                </td>
                <td class="px-4 py-2">password</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="mt-6">
        <a href="{{ route('login') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Inloggen
        </a>
    </div>
</div>

</body>
</html>
