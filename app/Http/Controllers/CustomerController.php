<?php

namespace App\Http\Controllers;

use App\Models\Family;
use App\Models\Contact;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Family::with('contact', 'representative')->get();
        $postcodes = Contact::select('Postcode')->distinct()->pluck('Postcode');

        return view('customer.index', compact('customers', 'postcodes'));
    }

    public function filter(Request $request)
    {
        $postcode = $request->input('postcode');
        $postcodes = Contact::select('Postcode')->distinct()->pluck('Postcode');

        $customers = Family::whereHas('contact', function ($query) use ($postcode) {
            $query->where('Postcode', $postcode);
        })->with('contact', 'representative')->get();

        if ($customers->isEmpty()) {
            return view('customer.index', [
                'customers' => collect(),
                'postcodes' => $postcodes,
                'message' => 'Er zijn geen klanten bekent die de geselecteerde postcode hebben',
            ]);
        }

        return view('customer.index', compact('customers', 'postcodes'));
    }

    public function show($id)
    {
        $customer = Family::with('contact', 'representative')->findOrFail($id);
        return view('customer.show', compact('customer'));
    }
}
