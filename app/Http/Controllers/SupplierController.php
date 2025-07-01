<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Models\Product;
use App\Models\ProductSupplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SupplierController extends Controller
{
    public function index(Request $request)
    {
        $query = Supplier::query();

        if ($request->filled('LeverancierType')) {
            $query->where('LeverancierType', $request->LeverancierType);
        }

        $suppliers = $query->withCount('products')->get();

        if ($suppliers->isEmpty()) {
            return view('manager.supplier.index', [
                'suppliers' => [],
                'message' => 'Er zijn geen leveranciers bekent van het geselecteerde leverancierstype',
            ]);
        }

        return view('manager.supplier.index', [
            'suppliers' => $suppliers,
            'message' => null,
        ]);
    }

    public function show(Supplier $supplier)
    {
        $products = $supplier->products()->withPivot('DatumAangeleverd', 'DatumEerstVolgendeLevering')->get();

        return view('manager.supplier.products', compact('supplier', 'products'));
    }

    public function editProduct($supplierId, $productId)
    {
        $productSupplier = ProductSupplier::where('supplier_id', $supplierId)
            ->where('product_id', $productId)
            ->firstOrFail();

        return view('manager.supplier.edit-product', compact('productSupplier'));
    }

    public function updateProduct(Request $request, $supplierId, $productId)
    {
        $request->validate([
            'DatumEerstVolgendeLevering' => 'required|date',
        ]);

        $productSupplier = ProductSupplier::where('supplier_id', $supplierId)
            ->where('product_id', $productId)
            ->firstOrFail();

        $productSupplier->DatumEerstVolgendeLevering = $request->DatumEerstVolgendeLevering;
        $productSupplier->DatumGewijzigd = Carbon::now();
        $productSupplier->save();

        return redirect()->route('manager.supplier.products', $supplierId)
            ->with('success', 'De houdbaarbaarheidsdatum is gewijzigd');
    }
}
