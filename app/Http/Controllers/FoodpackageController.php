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
        $validated = $request->validate([
            'Status' => 'required|in:Uitgereikt,Niet uitgereikt',
        ]);

        $pakket = FoodPackage::findOrFail($id);

        $pakket->Status = $validated['Status'];

        // Zet DatumUitgifte naar vandaag als status "Uitgereikt" is en nog niet gezet
        if ($pakket->Status === 'Uitgereikt' && !$pakket->DatumUitgifte) {
            $pakket->DatumUitgifte = Carbon::today();
        }

        // Als status "Niet uitgereikt", kan je eventueel DatumUitgifte resetten (optioneel)
        if ($pakket->Status === 'Niet uitgereikt') {
            $pakket->DatumUitgifte = null;
        }

        $pakket->save();

        // Redirect met flash message
        return redirect()->route('manager.foodpackage.edit', $pakket->id)
                        ->with('success', 'De wijziging is doorgevoerd')
                        ->with('redirectToIndex', true);  // Flag voor automatische redirect
    }
}
