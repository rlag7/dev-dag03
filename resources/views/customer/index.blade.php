<h2>Overzicht Klanten</h2>

<form method="POST" action="{{ route('clients.filter') }}">
    @csrf
    <select name="postcode">
        <option value="">Selecteer Postcode</option>
        <!-- Dynamisch invullen indien nodig -->
        <option value="5271ZH">5271ZH</option>
        <option value="5261AA">5261AA</option>
    </select>
    <button type="submit">Toon Klanten</button>
</form>

@if(session('message'))
    <p style="color:red;">{{ session('message') }}</p>
@endif

<table>
    <thead>
    <tr>
        <th>Naam Gezin</th>
        <th>Vertegenwoordiger</th>
        <th>E-mailadres</th>
        <th>Mobiel</th>
        <th>Adres</th>
        <th>Woonplaats</th>
        <th>Klant Details</th>
    </tr>
    </thead>
    <tbody>
    @forelse($clients as $client)
        <tr>
            <td>{{ $client->Naam }}</td>
            <td>{{ $client->representative->first()->Voornaam ?? '-' }}</td>
            <td>{{ $client->contact->first()->Email ?? '-' }}</td>
            <td>{{ $client->contact->first()->Mobiel ?? '-' }}</td>
            <td>{{ $client->contact->first()->Straat ?? '-' }} {{ $client->contact->first()->Huisnummer ?? '' }}</td>
            <td>{{ $client->contact->first()->Woonplaats ?? '-' }}</td>
            <td><a href="{{ route('clients.show', $client->id) }}">📄</a></td>
        </tr>
    @empty
        <tr>
            <td colspan="7">Geen klanten gevonden.</td>
        </tr>
    @endforelse
    </tbody>
</table>
