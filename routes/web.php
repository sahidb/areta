<?php

use App\Http\Controllers\ListingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;
use Termwind\Components\Li;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Common Resource Routes:
// index - show all listings
// show - show single listing
// create - show form to create new
// store - store to database
// edit - show edit form to edit listing
// update - update data to database
// destroy - delete listing

// All Listing
Route::get('/', [ListingController::class, 'index']);
// show create form
Route::get('/listings/create', [ListingController::class, 'create']);

// storing listing data
Route::post('/listings', [ListingController::class, 'store']);

// edit listing data
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit']);

// Single Listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);

// Route::get('/listings/{id}', function ($id) {
//     $listing = Listing::find($id);
//     if ($listing) {
//         return view('listing', [
//             'listing' => $listing
//         ]);
//     } else {
//         abort('404'); 
//     }
// });



// Route::get('/hello', function () {
//     return 'Hello World';
// });

// Route::get('posts/{id}', function ($id) {
//     return $id;
// })->where('id', '[0-9]+');

// Route::get('search', function (Request $request) {
//     return $request->name . ' ' . $request->city;
// });
