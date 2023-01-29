<?php

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
// All Listing
Route::get('/', function () {
    return view('listings', [
        'heading' => 'Latest listing',
        'listings' => Listing::all(),
    ]);
});

// Single Listing
Route::get('/listings/{listing}', function (Listing $listing) {
    return view('listing', [
        'listing' => $listing
    ]);
});
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
