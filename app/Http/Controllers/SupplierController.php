<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $types = Supplier::select('LeverancierType')->distinct()->pluck('LeverancierType');
        $suppliers = Supplier::all();

        return view('supplier.index', compact('suppliers', 'types'));
    }

    public function filter(Request $request)
    {
        $type = $request->input('LeverancierType');
        $types = Supplier::select('LeverancierType')->distinct()->pluck('LeverancierType');

        $suppliers = Supplier::where('LeverancierType', $type)->get();

        return view('supplier.index', [
            'suppliers' => $suppliers,
            'types' => $types,
        ]);
    }

    public function show($id)
    {
        $supplier = Supplier::findOrFail($id);
        return view('supplier.show', compact('supplier'));
    }

    public function edit($id)
    {
        $supplier = Supplier::findOrFail($id);
        return view('supplier.edit', compact('supplier'));
    }
}
