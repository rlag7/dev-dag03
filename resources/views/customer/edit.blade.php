<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Wijzig Klantgegevens</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans antialiased">

<!-- Header (zelfde als x-app-layout) -->
<header class="bg-white shadow">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h2 class="text-2xl font-semibold text-blue-700 underline">
            Wijzig Klantgegevens <?= htmlspecialchars($customer->representative->first()->Voornaam ?? '-') ?>
                                 <?= htmlspecialchars($customer->representative->first()->Achternaam ?? '-') ?>
        </h2>
    </div>
</header>

<main class="py-6">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow border border-gray-200 rounded-lg p-6">

            <!-- Laravel error bag & messages -->
            <?php
            $rep = $customer->representative->first();
            $contact = $customer->contact->first();
            $errors = $errors ?? new \Illuminate\Support\MessageBag();
            ?>

            <?php if (session('error')): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded mb-4">
                    <?= htmlspecialchars(session('error')) ?>
            </div>
            <?php endif; ?>

            <?php if (session('success')): ?>
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4">
                    <?= htmlspecialchars(session('success')) ?>
            </div>
            <?php endif; ?>

            <?php if ($errors->any()): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded mb-4">
                <ul class="list-disc list-inside">
                        <?php foreach ($errors->all() as $error): ?>
                    <li><?= htmlspecialchars($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <?php endif; ?>

            <form method="POST" action="<?= route('customers.update', $customer->id) ?>">
                <?= csrf_field() ?>
                <input type="hidden" name="_method" value="PUT">

                <table class="table-auto w-full text-left border border-collapse">
                    <tbody>

                    <?php
                    function inputRow($label, $name, $value, $type = 'text', $errors = [], $readonly = false)
                    {
                        $hasError = $errors->has($name);
                        $errorClass = $hasError ? 'border-red-500' : '';
                        $errorMessage = $hasError ? '<p class="text-red-500 text-sm mt-1">' . htmlspecialchars($errors->first($name)) . '</p>' : '';
                        $readonlyAttr = $readonly ? 'readonly disabled class="w-full border rounded px-3 py-2 bg-gray-100 text-gray-700"' : 'class="w-full border rounded px-3 py-2 ' . $errorClass . '"';

                        echo '
                        <tr>
                            <th class="px-4 py-2 border font-medium">' . htmlspecialchars($label) . '</th>
                            <td class="px-4 py-2 border">
                                <input type="' . $type . '" name="' . $name . '" value="' . htmlspecialchars(old($name, $value)) . '" ' . $readonlyAttr . '>
                                ' . $errorMessage . '
                            </td>
                        </tr>';
                    }

                    inputRow('Voornaam', 'Voornaam', $rep->Voornaam, 'text', $errors);
                    inputRow('Tussenvoegsel', 'Tussenvoegsel', $rep->Tussenvoegsel, 'text', $errors);
                    inputRow('Achternaam', 'Achternaam', $rep->Achternaam, 'text', $errors);
                    inputRow('Geboortedatum', 'Geboortedatum', $rep->Geboortedatum, 'date', $errors);
                    inputRow('Type Persoon', 'TypePersoon', ucfirst($rep->TypePersoon ?? '-'), 'text', $errors, true);
                    inputRow('Vertegenwoordiger', 'IsVertegenwoordiger', $rep->IsVertegenwoordiger ? 'Ja' : 'Nee', 'text', $errors, true);
                    inputRow('Straat', 'Straat', $contact->Straat, 'text', $errors);
                    inputRow('Huisnummer', 'Huisnummer', $contact->Huisnummer, 'text', $errors);
                    inputRow('Toevoeging', 'Toevoeging', $contact->Toevoeging, 'text', $errors);
                    inputRow('Postcode', 'Postcode', $contact->Postcode, 'text', $errors);
                    inputRow('Woonplaats', 'Woonplaats', $contact->Woonplaats, 'text', $errors);
                    inputRow('E-mailadres', 'Email', $contact->Email, 'email', $errors);
                    inputRow('Mobiel', 'Mobiel', $contact->Mobiel, 'text', $errors);
                    ?>

                    </tbody>
                </table>

                <!-- Knoppen -->
                <div class="flex justify-between mt-6">
                    <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded shadow">
                        Opslaan
                    </button>
                    <div class="space-x-2">
                        <a href="<?= route('customers.show', $customer->id) ?>"
                           class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Terug</a>
                        <a href="<?= route('dashboard') ?>"
                           class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Home</a>
                    </div>
                </div>
            </form>

        </div>
    </div>
</main>

</body>
</html>
