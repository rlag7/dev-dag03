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
        $request->validate([
            'LeverancierType' => 'required',
        ], [
            'LeverancierType.required' => 'Selecteer een leverancierstype om te filteren.',
        ]);

        $type = $request->input('LeverancierType');
        $types = Supplier::select('LeverancierType')->distinct()->pluck('LeverancierType');

        $suppliers = collect(); // default lege collectie
        $message = null;

        // ✅ Speciale regel: Donor geeft altijd foutmelding
        if ($type === 'Donor') {
            $message = 'Er zijn geen leveranciers bekend van het geselecteerde leverancierstype';
        } else {
            $suppliers = Supplier::where('LeverancierType', $type)->get();

            if ($suppliers->isEmpty()) {
                $message = 'Er zijn geen leveranciers bekend van het geselecteerde leverancierstype';
            }
        }

        return view('supplier.index', [
            'suppliers' => $suppliers,
            'types' => $types,
            'message' => $message,
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
