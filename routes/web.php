<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
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
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');

// storing listing data
Route::post('/listings', [ListingController::class, 'store'])->middleware('auth');

// edit listing data
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');

// Update listing data
Route::put('/listings/{listing}', [ListingController::class, 'update'])->middleware('auth');

// Delete listing data
Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])->middleware('auth');

// Single Listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);

// Show Register User
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

// store registerd user
Route::post('/users', [UserController::class, 'store']);

// logout
Route::post('/logout', [UserController::class, 'logout']);

// login form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// authenticate userR
Route::post('/users/authenticate', [UserController::class, 'authenticate']);



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
