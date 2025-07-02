<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Klant Details</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans antialiased">
<header class="bg-white shadow">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h2 class="text-2xl font-semibold text-green-700 underline">
            Klant Details <?php echo htmlspecialchars($customer->representative->first()->Voornaam ?? '-'); ?>
                          <?php echo htmlspecialchars($customer->representative->first()->Achternaam ?? '-'); ?>
        </h2>
    </div>
</header>

<main class="py-6">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow border border-gray-200 rounded-lg p-6">

            <?php
            $rep = $customer->representative->first();
            $contact = $customer->contact->first();
            ?>

            <?php if (!$rep && !$contact): ?>
            <p class="text-red-600">⚠️ Geen klantgegevens gevonden.</p>
            <?php else: ?>
            <table class="table-auto w-full text-left border border-collapse">
                <tbody>
                <tr>
                    <th class="font-medium px-4 py-2 border">Gezinsnaam</th>
                    <td class="px-4 py-2 border"><?php echo htmlspecialchars($customer->Naam ?? '-'); ?></td>
                </tr>
                <tr>
                    <th class="font-medium px-4 py-2 border">Voornaam</th>
                    <td class="px-4 py-2 border"><?php echo htmlspecialchars($rep->Voornaam ?? '-'); ?></td>
                </tr>
                <tr>
                    <th class="font-medium px-4 py-2 border">Tussenvoegsel</th>
                    <td class="px-4 py-2 border"><?php echo htmlspecialchars($rep->Tussenvoegsel ?? '-'); ?></td>
                </tr>
                <tr>
                    <th class="font-medium px-4 py-2 border">Achternaam</th>
                    <td class="px-4 py-2 border"><?php echo htmlspecialchars($rep->Achternaam ?? '-'); ?></td>
                </tr>
                <tr>
                    <th class="font-medium px-4 py-2 border">Geboortedatum</th>
                    <td class="px-4 py-2 border"><?php echo htmlspecialchars($rep->Geboortedatum ?? '-'); ?></td>
                </tr>
                <tr>
                    <th class="font-medium px-4 py-2 border">Vertegenwoordiger</th>
                    <td class="px-4 py-2 border">
                            <?php
                            echo isset($rep->IsVertegenwoordiger)
                                ? ($rep->IsVertegenwoordiger ? 'Ja' : 'Nee')
                                : '-';
                            ?>
                    </td>
                </tr>
                <tr>
                    <th class="font-medium px-4 py-2 border">Straat</th>
                    <td class="px-4 py-2 border"><?php echo htmlspecialchars($contact->Straat ?? '-'); ?></td>
                </tr>
                <tr>
                    <th class="font-medium px-4 py-2 border">Huisnummer</th>
                    <td class="px-4 py-2 border"><?php echo htmlspecialchars($contact->Huisnummer ?? '-'); ?></td>
                </tr>
                <tr>
                    <th class="font-medium px-4 py-2 border">Toevoeging</th>
                    <td class="px-4 py-2 border"><?php echo htmlspecialchars($contact->Toevoeging ?? '-'); ?></td>
                </tr>
                <tr>
                    <th class="font-medium px-4 py-2 border">Postcode</th>
                    <td class="px-4 py-2 border"><?php echo htmlspecialchars($contact->Postcode ?? '-'); ?></td>
                </tr>
                <tr>
                    <th class="font-medium px-4 py-2 border">Woonplaats</th>
                    <td class="px-4 py-2 border"><?php echo htmlspecialchars($contact->Woonplaats ?? '-'); ?></td>
                </tr>
                <tr>
                    <th class="font-medium px-4 py-2 border">E-mailadres</th>
                    <td class="px-4 py-2 border"><?php echo htmlspecialchars($contact->Email ?? '-'); ?></td>
                </tr>
                <tr>
                    <th class="font-medium px-4 py-2 border">Mobiel</th>
                    <td class="px-4 py-2 border"><?php echo htmlspecialchars($contact->Mobiel ?? '-'); ?></td>
                </tr>
                </tbody>
            </table>
            <?php endif; ?>

            <div class="flex justify-between mt-6">
                <a href="/customers/<?php echo $customer->id; ?>/edit"
                   class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Wijzig
                </a>
                <div class="space-x-2">
                    <a href="/customers"
                       class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                        Terug
                    </a>
                    <a href="/dashboard"
                       class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                        Home
                    </a>
                </div>
            </div>

        </div>
    </div>
</main>
</body>
</html>
