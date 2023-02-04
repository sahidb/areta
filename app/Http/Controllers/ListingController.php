<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Session;

class ListingController extends Controller
{
    // Melihat semua listing
    public function index()
    {
        return view('listings.index', [
            'heading' => 'Latest listing',
            // 'listings' => Listing::latest()->filter(request(['tag', 'search']))->get(),
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(6),
            // 'listings' => Listing::latest()->filter(request(['tag', 'search']))->simplePaginate(6),

        ]);
    }
    // melihat salah satu listing
    public function show(Listing $listing)
    {
        return view('listings.show', [
            'listing' => $listing
        ]);
    }

    // menampilkan form create
    public function create()
    {
        return view('listings.create');
    }

    // storing data
    public function store(Request $request)
    {
        // dd($request->all());
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings', 'company')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required',
        ]);

        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }
        Listing::create($formFields);
        // Session::flash('message', 'Listing Created');

        return redirect('/')->with('message', 'Listing Created successfully');
    }
}
