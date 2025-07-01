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
        $filtered = false;
        $allergyId = $request->input('allergy_id');

        // Haal ALTIJD alle families op met hun personen + allergieën
        $families = Family::with('people.allergies')->get();

        // Debug: check of personen geladen worden
        // \Log::info('Loaded families', $families->toArray());

        if ($allergyId) {
            $filtered = true;
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
        $family->load(['people.allergies']);

        return view('allergie.show', [
            'family' => $family,
            'allergyId' => $allergyId,
        ]);
    }
}
