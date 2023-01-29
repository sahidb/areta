<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('listings', [
        'heading' => 'Latest listing',
        'listings' => [
            // [
            //     'id' => 1,
            //     'title' => 'listing one',
            //     'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora, aliquid?',
            // ],
            // [
            //     'id' => 2,
            //     'title' => 'listing two',
            //     'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora, aliquid?',
            // ]
        ]
    ]);
});

// Route::get('/hello', function () {
//     return 'Hello World';
// });

// Route::get('posts/{id}', function ($id) {
//     return $id;
// })->where('id', '[0-9]+');

// Route::get('search', function (Request $request) {
//     return $request->name . ' ' . $request->city;
// });
