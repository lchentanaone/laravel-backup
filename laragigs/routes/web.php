<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;
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
// Example Routes
// Route::get('/hello', function () {
//     return response('<h1>Hello World</h1>',200)
//         ->header('Content-Type', 'text/plain')
//         ->header('foo', 'bar');
// });

// Route::get('/posts/{id}', function($id){
//     return response('Post ' . $id);
// })->where('id', '[0-9]+');

// Route::get('/search', function (Request $request) {
//     return ($request->name . ' ' . $request->city);
// });

// All Listing
Route::get('/',  [ListingController::class, 'index']);


// Show create Form 
Route::get('/listings/create',  [ListingController::class, 'create'])->middleware('auth');

// store listing data
Route::post('/listings', [ListingController::class,'store'])->middleware('auth');
 
// Update Listings
Route::put('/listings/{listing}', [ListingController::class, 'update'])->middleware('auth');

// Show Edit Form 
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');

// Delete
Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])->middleware('auth');

// Manage Listing
Route::get('/listings/manage', [ListingController::class, 'manage'])->middleware('auth');

// Single Listing
Route::get('/listings/{listing}', [ListingController::class,'show']);

// Register create form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

// Create new User
Route::post('/users', [UserController::class, 'store']);

//Log out user
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// show login form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

//Log in User
Route::post('/users/authenticate', [UserController::class, 'authenticate']);



 