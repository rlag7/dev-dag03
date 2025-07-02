<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Allergy;
use App\Models\Family;
use App\Models\Person;

class AllergyController extends Controller
{
    public function index(Request $request)
    {
        $allergies = Allergy::all();
        $allergyId = $request->input('allergy_id');
        $filtered = false;

        if ($allergyId) {
            $families = Family::whereHas('people.allergies', function ($query) use ($allergyId) {
                $query->where('allergies.id', $allergyId);
            })->with(['people.allergies' => function ($query) use ($allergyId) {
                $query->where('allergies.id', $allergyId);
            }])->get();
            $filtered = true;
        } else {
            $families = Family::with('people.allergies')->get();
        }

        return view('allergie.index', [
            'families' => $families,
            'allergies' => $allergies,
            'filtered' => $filtered,
            'allergyId' => $allergyId,
        ]);
    }

    public function show(Family $family, Request $request)
    {
        $allergyId = $request->get('allergy_id');

        $people = $family->people()->with('allergies')->get();
        $allergy = Allergy::find($allergyId);

        return view('allergie.show', compact('family', 'people', 'allergy', 'allergyId'));
    }



    public function edit($personId)
    {
        $person = Person::with('allergies')->findOrFail($personId);
        $currentAllergy = $person->allergies->first(); // We gaan uit van 1 actieve allergie
        $allergies = Allergy::all();

        return view('allergie.edit', compact('person', 'allergies', 'currentAllergy'));
    }

// Verwerk de wijziging van een allergie
    public function update(Request $request, $personId)
    {
        $validated = $request->validate([
            'allergy_id' => 'required|exists:allergies,id'
        ]);

        $person = Person::findOrFail($personId);

        $person->allergies()->sync([$validated['allergy_id']]);

        $risk = Allergy::find($validated['allergy_id'])->AnafylactischRisico;

        if ($risk === 'Hoog') {
            return redirect()->route('manager.allergie.edit', $personId)
                ->with([
                    'success' => 'De allergie is succesvol bijgewerkt.',
                    'warning' => 'Voor het wijzigen van deze allergie wordt geadviseerd eerst een arts te raadplegen vanwege een hoog risico op een anafylactisch shock.'
                ]);
        } else {
            // warning verwijderen als die er nog staat
            session()->forget('warning');

            return redirect()->route('manager.allergie.edit', $personId)
                ->with('success', 'De allergie is succesvol bijgewerkt.');
        }
    }


}
