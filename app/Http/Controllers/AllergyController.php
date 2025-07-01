<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Allergy;
use App\Models\Family;

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

        if ($allergyId) {
            $family->load(['people' => function ($query) use ($allergyId) {
                $query->whereHas('allergies', function ($q) use ($allergyId) {
                    $q->where('allergies.id', $allergyId);
                })->with(['allergies' => function ($q) use ($allergyId) {
                    $q->where('allergies.id', $allergyId);
                }]);
            }]);
        } else {
            $family->load('people.allergies');
        }

        return view('allergie.show', compact('family', 'allergyId'));
    }

    public function edit(Allergy $allergy)
    {
        $allergies = Allergy::all(); // haal alle allergieën op voor dropdown
        return view('allergie.edit', compact('allergy', 'allergies'));
    }

    public function update(Request $request, Allergy $allergy)
    {
        $validated = $request->validate([
            'Naam' => 'required|string|max:255',
        ]);

        $allergy->Naam = $validated['Naam'];
        $allergy->save();

        return redirect()->route('manager.allergie.index')->with('success', 'Allergie succesvol bijgewerkt!');
    }
}
