<?php

namespace App\Http\Controllers;

use App\Models\Family;
use App\Models\Contact;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Family::with('contact', 'representative')->get();
        $postcodes = Contact::select('Postcode')->distinct()->pluck('Postcode');

        return view('customer.index', compact('clients', 'postcodes'));
    }

    public function filter(Request $request)
    {
        $postcode = $request->input('postcode');
        $postcodes = Contact::select('Postcode')->distinct()->pluck('Postcode');

        $clients = Family::whereHas('contact', function ($query) use ($postcode) {
            $query->where('Postcode', $postcode);
        })->with('contact', 'representative')->get();

        if ($clients->isEmpty()) {
            return view('customer.index', [
                'clients' => collect(),
                'postcodes' => $postcodes,
                'message' => 'Er zijn geen klanten bekent die de geselecteerde postcode hebben',
            ]);
        }

        return view('customer.index', compact('clients', 'postcodes'));
    }

    public function show($id)
    {
        $client = Family::with('contact', 'representative')->findOrFail($id);
        return view('customer.show', compact('client'));
    }

}
