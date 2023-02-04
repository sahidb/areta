<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    // Melihat semua listing
    public function index()
    {
        return view('listings', [
            'heading' => 'Latest listing',
            'listings' => Listing::all(),
        ]);
    }
    // melihat salah satu listing
    public function show(Listing $listing)
    {
        return view('listing', [
            'listing' => $listing
        ]);
    }
}
