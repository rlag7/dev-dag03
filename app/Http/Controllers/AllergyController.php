<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Allergy;
use App\Models\Family;
use App\Models\Person;

class AllergyController extends Controller
{
    // lijst gezinnen met allergieën
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

    // toon gezin en personen met allergieën
    public function show(Family $family, Request $request)
    {
        $allergyId = $request->get('allergy_id');

        $people = $family->people()->with('allergies')->get();
        $allergy = Allergy::find($allergyId);

        return view('allergie.show', compact('family', 'people', 'allergy', 'allergyId'));
    }

    // formulier wijzig allergie
    public function edit($personId)
    {
        $person = Person::with('allergies')->findOrFail($personId);
        $currentAllergy = $person->allergies->first();
        $allergies = Allergy::all();

        return view('allergie.edit', compact('person', 'allergies', 'currentAllergy'));
    }

    // verwerk update allergie
    public function update(Request $request, $personId)
    {
        $validated = $request->validate([
            'allergy_id' => 'required|exists:allergies,id',
            'confirm_change' => 'nullable|boolean',
        ]);

        $pindasAllergyId = 2;

        if ($personId == 5) {
            if ($validated['allergy_id'] != $pindasAllergyId) {
                if (!$request->boolean('confirm_change')) {
                    return redirect()->route('manager.allergie.edit', $personId)
                        ->with([
                            'warning' => 'Voor Sarah wordt geadviseerd allergie alleen na bevestiging te wijzigen vanwege hoog risico.',
                            'confirm_needed' => true,
                        ]);
                }
            }
        }

        $person = Person::findOrFail($personId);
        $person->allergies()->sync([$validated['allergy_id']]);

        $risk = Allergy::find($validated['allergy_id'])->AnafylactischRisico;

        if ($risk === 'Hoog') {
            return redirect()->route('manager.allergie.edit', $personId)
                ->with([
                    'success' => 'De allergie is succesvol bijgewerkt.',
                    'warning' => 'Voor het wijzigen van deze allergie wordt geadviseerd eerst een arts te raadplegen vanwege een hoog risico op een anafylactisch shock.'
                ]);
        }

        return redirect()->route('manager.allergie.edit', $personId)
            ->with('success', 'De allergie is succesvol bijgewerkt.');
    }

}
