<?php

namespace App\Http\Controllers;

use App\Models\FoodPackage;
use App\Models\Family;
use App\Models\Diet;
use App\Models\Product;
use App\Models\ProductFoodPackage;
use App\Models\DietFamily;    
use Illuminate\Support\Carbon;          
use Illuminate\Http\Request;

class FoodpackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index(Request $request)
    {
        $dietId = $request->get('eetwens');

        // Haal alle voedselpakketten op met gekoppelde families en hun personen + dieet
        $pakketten = FoodPackage::with(['family.people', 'family.diets'])->get();

        // Filter families (optioneel) op dieet
        $families = $pakketten->pluck('family')->unique('id');

        if ($dietId) {
            $families = $families->filter(function ($family) use ($dietId) {
                return $family->diets->contains('id', $dietId);
            });
        }

        $diets = Diet::all();

        return view('foodpackage.index', [
            'pakketten' => $pakketten,
            'families' => $families,
            'diets' => $diets,
            'dietId' => $dietId
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('foodpackage.edit', [
            'pakket' => FoodPackage::with('family')->findOrFail($id)
        ]);
    }


    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, string $id)
    {
        $pakket = FoodPackage::with('family')->findOrFail($id);

        // Controleer of het gezin actief is
        if (!$pakket->family || !$pakket->family->IsActief) {
            // Redirect terug naar edit met een foutmelding
            return redirect()->route('manager.foodpackage.edit', $pakket->id)
                            ->with('error', 'Dit gezin is niet meer ingeschreven bij de voedselbank en daarom kan er geen voedselpakket worden uitgereikt');
        }

        $validated = $request->validate([
            'Status' => 'required|in:Uitgereikt,Niet uitgereikt',
        ]);

        $pakket->Status = $validated['Status'];

        if ($pakket->Status === 'Uitgereikt' && !$pakket->DatumUitgifte) {
            $pakket->DatumUitgifte = Carbon::today();
        }

        if ($pakket->Status === 'Niet uitgereikt') {
            $pakket->DatumUitgifte = null;
        }

        $pakket->save();

        return redirect()->route('manager.foodpackage.index', $pakket->id)
                        ->with('success', 'De wijziging is doorgevoerd')
                        ->with('redirectToIndex', true);
    }
}
