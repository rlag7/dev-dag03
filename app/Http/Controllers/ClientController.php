<?php

namespace App\Http\Controllers;

use App\Models\Family;
use Illuminate\Http\Request;

class ClientController extends Controller
{
public function index()
{
// Toon alle klanten standaard
$clients = Family::with('contact', 'representative')->get();

return view('customer.index', compact('clients'));
}

public function filter(Request $request)
{
$postcode = $request->input('postcode');

$clients = Family::whereHas('contact', function ($query) use ($postcode) {
$query->where('Postcode', $postcode);
})->with('contact', 'representative')->get();

if ($clients->isEmpty()) {
return back()->with('message', 'Er zijn geen klanten bekent die de geselecteerde postcode hebben')
->with('clients', collect());
}

return view('customer.index', compact('clients'));
}
}
