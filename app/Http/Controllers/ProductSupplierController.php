<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\Product;
use Carbon\Carbon;

class ProductSupplierController extends Controller
{
    public function edit($supplierId, $productId)
    {
        $supplier = Supplier::findOrFail($supplierId);
        $product = $supplier->products()->where('products.id', $productId)->firstOrFail();

        return view('product_supplier.edit', compact('supplier', 'product'));
    }

    public function update(Request $request, $supplierId, $productId)
    {
        $supplier = Supplier::findOrFail($supplierId);
        $product = $supplier->products()->where('products.id', $productId)->firstOrFail();

        // ✅ 1. Valideer het datumformaat vóór Carbon::parse
        $request->validate([
            'DatumEerstVolgendeLevering' => ['required', 'date', 'after_or_equal:2024-01-01'],
        ], [
            'DatumEerstVolgendeLevering.date' => 'Voer een geldige datum in.',
            'DatumEerstVolgendeLevering.after_or_equal' => 'De datum mag niet vóór het jaar 2024 zijn.',
        ]);

        $newDate = Carbon::parse($request->input('DatumEerstVolgendeLevering'));
        $currentDate = Carbon::parse($product->pivot->DatumEerstVolgendeLevering);

        // ✅ 2. Controleer op max. 7 dagen vooruit
        if ($newDate->gt($currentDate->copy()->addDays(7))) {
            return back()
                ->withErrors([
                    'DatumEerstVolgendeLevering' => 'De houdbaarheidsdatum mag met maximaal 7 dagen worden verlengd.'
                ])
                ->with('errorHeader', 'De houdbaarheidsdatum is niet gewijzigd.')
                ->withInput();
        }

        // ✅ 3. Update pivot-gegevens
        $supplier->products()->updateExistingPivot($productId, [
            'DatumEerstVolgendeLevering' => $newDate,
            'DatumGewijzigd' => now(),
        ]);

        return back()->with([
            'message' => 'De houdbaarheidsdatum is gewijzigd.',
            'success' => true
        ]);
    }

}
