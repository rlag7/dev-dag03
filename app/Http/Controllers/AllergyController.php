<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Family;
use App\Models\Allergy;

class AllergyController extends Controller
{
    public function index()
    {
        $families = Family::whereHas('people.allergies')->with('people.allergies')->get();
        $allergies = Allergy::all();

        return view('allergy.overview', compact('families', 'allergies'));
    }

    public function filter(Request $request)
    {
        $allergyId = $request->get('allergy_id');
        $allergies = Allergy::all();

        $families = Family::whereHas('people.allergies', function ($query) use ($allergyId) {
            $query->where('allergy_id', $allergyId);
        })->with(['people' => function ($q) use ($allergyId) {
            $q->whereHas('allergies', function ($subQuery) use ($allergyId) {
                $subQuery->where('allergy_id', $allergyId);
            });
        }, 'people.allergies'])->get();

        if ($families->isEmpty()) {
            return view('allergy.no-results', compact('allergies', 'allergyId'));
        }

        return view('allergy.filtered', compact('families', 'allergies', 'allergyId'));
    }
}
