<?php

namespace App\Http\Controllers;

use App\Models\Family;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Family::with('contact', 'representative')->get();
        $postcodes = Contact::select('Postcode')->distinct()->pluck('Postcode');

        return view('customer.index', compact('customers', 'postcodes'));
    }

    public function filter(Request $request)
    {
        $postcode = $request->input('postcode');
        $postcodes = Contact::select('Postcode')->distinct()->pluck('Postcode');

        $customers = Family::whereHas('contact', function ($query) use ($postcode) {
            $query->where('Postcode', $postcode);
        })->with('contact', 'representative')->get();

        if ($customers->isEmpty()) {
            return view('customer.index', [
                'customers' => collect(),
                'postcodes' => $postcodes,
                'message' => 'Er zijn geen klanten bekent die de geselecteerde postcode hebben',
            ]);
        }

        return view('customer.index', compact('customers', 'postcodes'));
    }

    public function show($id)
    {
        $customer = Family::with('contact', 'representative')->findOrFail($id);
        return view('customer.show', compact('customer'));
    }


    public function edit($id)
    {
        $customer = Family::with('contact', 'representative')->findOrFail($id);

        // Alleen rollen tonen die toegestaan zijn (zonder admin & manager)
        $roles = Role::whereIn('name', ['employee', 'volunteer'])
            ->pluck('name', 'name'); // ['employee' => 'employee', 'volunteer' => 'volunteer']

        return view('customer.edit', compact('customer', 'roles'));
    }



    public function update(Request $request, $id)
    {
        $customer = Family::with('contact', 'representative')->findOrFail($id);
        $contactId = $customer->contact->first()?->id;

        $validated = $request->validate([
            // Persoon
            'Voornaam' => ['required', 'regex:/^[^\d]*$/', 'max:255'],
            'Tussenvoegsel' => ['nullable', 'regex:/^[^\d-]*$/', 'max:50'],
            'Achternaam' => ['required', 'regex:/^[^\d]*$/', 'max:255'],
            'Geboortedatum' => [
                'required',
                'date',
                'before_or_equal:' . now()->subYears(8)->toDateString(),
                'after_or_equal:' . now()->subYears(120)->toDateString()
            ],
            'IsVertegenwoordiger' => 'required|in:0,1',

            // Contact
            'Straat' => 'required|string|max:255',
            'Huisnummer' => ['required', 'numeric', 'min:1', 'max:10000'],
            'Toevoeging' => ['nullable', 'regex:/^[^\d-]*$/', 'max:10'],
            'Postcode' => [
                'required',
                'regex:/^[1-9][0-9]{3}[A-Z]{2}$/',
                function ($attribute, $value, $fail) {
                    if (!str_starts_with($value, '52')) {
                        $fail('De postcode komt niet uit de regio Maaskantje.');
                    }
                }
            ],
            'Woonplaats' => ['required', 'regex:/^[^\d-]*$/', 'max:255'],
            'Email' => [
                'required',
                'email',
                Rule::unique('contacts', 'Email')->ignore($contactId),
            ],
            'Mobiel' => [
                'required',
                'regex:/^(0[1-9][0-9]{8}|\+31[1-9][0-9]{8})$/',
                Rule::unique('contacts', 'Mobiel')->ignore($contactId),
            ],
        ], [
            'Voornaam.max' => 'Voornaam mag maximaal 255 tekens bevatten.',
            'Voornaam.required' => 'Voornaam is verplicht.',
            'Voornaam.regex' => 'Voornaam mag geen cijfers bevatten.',
            'Tussenvoegsel.regex' => 'Tussenvoegsel mag geen cijfers of streepjes bevatten.',
            'Achternaam.required' => 'Achternaam is verplicht.',
            'Achternaam.regex' => 'Achternaam mag geen cijfers bevatten.',
            'Geboortedatum.before_or_equal' => 'Je moet minstens 18 jaar oud zijn.',
            'Geboortedatum.after_or_equal' => 'Geboortedatum is te oud (maximaal 120 jaar geleden).',
            'Huisnummer.numeric' => 'Huisnummer moet een getal zijn.',
            'Huisnummer.min' => 'Huisnummer moet minstens 1 zijn.',
            'Huisnummer.max' => 'Huisnummer mag niet groter zijn dan 10000.',
            'Toevoeging.regex' => 'Toevoeging mag geen cijfers of streepjes bevatten.',
            'Woonplaats.regex' => 'Woonplaats mag geen cijfers of streepjes bevatten.',
            'Postcode.regex' => 'Postcode moet een geldig formaat hebben (bijv. 5211AB).',
            'Email.unique' => 'Dit e-mailadres is al in gebruik.',
            'Mobiel.unique' => 'Dit mobiele nummer is al in gebruik.',
            'Mobiel.regex' => 'Mobiel nummer moet starten met 0 of +31 en 9 cijfers bevatten.',
        ]);

        try {
            // Update vertegenwoordiger
            $representative = $customer->representative->first();
            if ($representative) {
                $representative->update([
                    'Voornaam' => $validated['Voornaam'],
                    'Tussenvoegsel' => $validated['Tussenvoegsel'],
                    'Achternaam' => $validated['Achternaam'],
                    'Geboortedatum' => $validated['Geboortedatum'],
                    // 'TypePersoon' intentionally left out
                    'IsVertegenwoordiger' => $validated['IsVertegenwoordiger'],
                ]);
            }

            // Update contactgegevens
            $contact = $customer->contact->first();
            if ($contact) {
                $contact->update([
                    'Straat' => $validated['Straat'],
                    'Huisnummer' => $validated['Huisnummer'],
                    'Toevoeging' => $validated['Toevoeging'],
                    'Postcode' => $validated['Postcode'],
                    'Woonplaats' => $validated['Woonplaats'],
                    'Email' => $validated['Email'],
                    'Mobiel' => $validated['Mobiel'],
                ]);
            }

            return redirect()
                ->back()
                ->with('success', 'De klantgegevens zijn succesvol bijgewerkt.');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Er is iets misgegaan bij het opslaan van de gegevens.');
        }
    }





}
