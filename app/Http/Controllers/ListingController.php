<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    // Melihat semua listing
    public function index()
    {
        return view('listings.index', [
            'heading' => 'Latest listing',
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->get(),
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
}
