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

        $newDate = Carbon::parse($request->input('DatumEerstVolgendeLevering'));
        $currentDate = Carbon::parse($product->pivot->DatumEerstVolgendeLevering);

        if ($newDate->gt($currentDate->copy()->addDays(7))) {
            return back()->with('message', 'De houdbaarheidsdatum is niet gewijzigd. De houdbaarheidsdatum mag met maximaal 7 dagen worden verlengd.');
        }

        $supplier->products()->updateExistingPivot($productId, [
            'DatumEerstVolgendeLevering' => $newDate,
            'DatumGewijzigd' => now(),
        ]);

        return redirect()->route('manager.supplier.show', $supplierId)
            ->with('message', 'De houdbaarbaarheidsdatum is gewijzigd');
    }
}
