
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Klant Details</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-6 bg-gray-100">
<div class="w-full max-w-6xl mx-auto text-left">

    <!-- Titel -->
    <h2 class="text-2xl font-semibold text-green-700 underline mb-6">
        Klant Details - Jan Jansen
    </h2>

    <!-- Details Tabel -->
    <div class="bg-white shadow-lg rounded p-6">
        <table class="min-w-full text-sm text-left border border-collapse">
            <tbody>
            <tr><th class="bg-gray-100 font-semibold px-4 py-2 border">Voornaam</th><td class="px-4 py-2 border">Jan</td></tr>
            <tr><th class="bg-gray-100 font-semibold px-4 py-2 border">Tussenvoegsel</th><td class="px-4 py-2 border">van</td></tr>
            <tr><th class="bg-gray-100 font-semibold px-4 py-2 border">Achternaam</th><td class="px-4 py-2 border">Jansen</td></tr>
            <tr><th class="bg-gray-100 font-semibold px-4 py-2 border">Geboortedatum</th><td class="px-4 py-2 border">01-01-1980</td></tr>
            <tr><th class="bg-gray-100 font-semibold px-4 py-2 border">Type Persoon</th><td class="px-4 py-2 border">Vrijwilliger</td></tr>
            <tr><th class="bg-gray-100 font-semibold px-4 py-2 border">Vertegenwoordiger</th><td class="px-4 py-2 border">Ja</td></tr>
            <tr><th class="bg-gray-100 font-semibold px-4 py-2 border">Straatnaam</th><td class="px-4 py-2 border">Hoofdstraat</td></tr>
            <tr><th class="bg-gray-100 font-semibold px-4 py-2 border">Huisnummer</th><td class="px-4 py-2 border">12</td></tr>
            <tr><th class="bg-gray-100 font-semibold px-4 py-2 border">Toevoeging</th><td class="px-4 py-2 border">A</td></tr>
            <tr><th class="bg-gray-100 font-semibold px-4 py-2 border">Postcode</th><td class="px-4 py-2 border">1234 AB</td></tr>
            <tr><th class="bg-gray-100 font-semibold px-4 py-2 border">Woonplaats</th><td class="px-4 py-2 border">Maaskantje</td></tr>
            <tr><th class="bg-gray-100 font-semibold px-4 py-2 border">E-mail</th><td class="px-4 py-2 border">jan.jansen@email.com</td></tr>
            <tr><th class="bg-gray-100 font-semibold px-4 py-2 border">Mobiel</th><td class="px-4 py-2 border">06-12345678</td></tr>
            </tbody>
        </table>

        <!-- Knoppen -->
        <div class="flex justify-between mt-6">
            <a href="{{ route('customers.edit', $customer->id) }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Wijzig</a>
            <div class="space-x-2">
                <a href="{{ route('customers.index') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">terug</a>
                <a href="{{ route('dashboard') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">home</a>
            </div>
        </div>
    </div>
</div>
</body>
</html>
