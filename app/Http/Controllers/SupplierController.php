<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class SupplierController extends Controller
{
    public function index()
    {
        $types = Supplier::select('LeverancierType')->distinct()->pluck('LeverancierType');
        $suppliers = Supplier::with('contacts')->get();

        return view('supplier.index', compact('suppliers', 'types'));
    }

    public function filter(Request $request)
    {
        $type = $request->input('LeverancierType');
        $types = Supplier::select('LeverancierType')->distinct()->pluck('LeverancierType');

        $suppliers = Supplier::where('LeverancierType', $type)->with('contacts')->get();

        if ($suppliers->isEmpty()) {
            return view('supplier.index', [
                'suppliers' => collect(),
                'types' => $types,
                'message' => 'Er zijn geen leveranciers bekent van het geselecteerde leverancierstype.',
            ]);
        }

        return view('supplier.index', compact('suppliers', 'types'));
    }

    /**
     * Toon producten van een specifieke leverancier.
     */
    public function showProducts($supplierId)
    {
        $supplier = Supplier::with('products')->findOrFail($supplierId);
        $products = $supplier->products;

        return view('supplier.product', compact('supplier', 'products'));
    }


    /**
     * Formulier om product-houdbaarheidsdatum te wijzigen.
     */
    public function editProduct($supplierId, $productId)
    {
        $supplier = Supplier::findOrFail($supplierId);
        $product = $supplier->products()->where('product_id', $productId)->firstOrFail();

        return view('supplier.edit_product', compact('supplier', 'product'));
    }

    /**
     * Update de houdbaarheidsdatum, max. 7 dagen verschil.
     */
    public function updateProduct(Request $request, $supplierId, $productId)
    {
        $request->validate([
            'DatumEerstVolgendeLevering' => 'required|date',
        ]);

        $supplier = Supplier::findOrFail($supplierId);
        $product = $supplier->products()->where('product_id', $productId)->firstOrFail();

        $current = new Carbon($product->pivot->DatumEerstVolgendeLevering);
        $new = new Carbon($request->DatumEerstVolgendeLevering);

        if ($new->gt($current->copy()->addDays(7))) {
            return redirect()->back()->with('error', 'De houdbaarheidsdatum is niet gewijzigd. De houdbaarheidsdatum mag met maximaal 7 dagen worden verlengd');
        }

        $supplier->products()->updateExistingPivot($productId, [
            'DatumEerstVolgendeLevering' => $new->toDateString()
        ]);

        return redirect()->route('manager.supplier.show', $supplierId)->with('success', 'De houdbaarbaarheidsdatum is gewijzigd');
    }
}
