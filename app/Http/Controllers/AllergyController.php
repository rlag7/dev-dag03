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
        $families = collect(); // Lege collectie standaard

        if ($request->has('allergy_id') && $request->allergy_id) {
            $filtered = true;
            $allergyId = $request->allergy_id;

            $families = Family::whereHas('people.allergies', function ($query) use ($allergyId) {
                $query->where('allergy_id', $allergyId);
            })->with(['people.allergies'])->get();
        } else {
            $families = Family::whereHas('people.allergies')->with('people.allergies')->get();
        }

        return view('allergie.index', compact('families', 'allergies', 'filtered'));
    }

    public function show(Family $family, Request $request)
    {
        $allergyId = $request->get('allergy_id');
        $family->load(['people.allergies']); // eager loading

        return view('allergie.show', [
            'family' => $family,
            'allergyId' => $allergyId,
        ]);
    }

}
