<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\User;
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

        $formFields['user_id'] = auth()->id();
        Listing::create($formFields);
        // Session::flash('message', 'Listing Created');

        return redirect('/')->with('message', 'Listing Created successfully');
    }

    public function edit(Listing $listing)
    {
        // dd($listing);
        return view('listings.edit', ['listing' => $listing]);
    }

    // updating data
    public function update(Request $request, Listing $listing)
    {
        // dd($request->all());
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required'],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required',
        ]);

        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $listing->update($formFields);
        // Session::flash('message', 'Listing Created');
        return back()->with('message', 'Listing Edited successfully');
    }

    // delete data
    public function destroy(Listing $listing)
    {
        $listing->delete();
        return redirect('/')->with('message', 'Listing deleted successfully');
    }
    // Manage Listings
    public function manage()
    {
        return view('listings.manage', ['listings' => auth()->user()->listings()->get()]);
    }
}
