<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TableController;
use App\Http\Controllers\PointsController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PolygonsController;
use App\Http\Controllers\PolylinesController;

Route::get('/', [PublicController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('points', PointsController::class);
Route::resource('polylines', PolylinesController::class);
Route::resource('polygons', PolygonsController::class);

Route::get('/map', [PointsController::class, 'index'])
->middleware(['auth', 'verified'])
->name('map');

Route::get('/table', [TableController::class, 'index'])->name('table');


Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews.index');

Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');
// Route edit & update review
Route::get('/reviews/{review}/edit', [ReviewController::class, 'edit'])->name('reviews.edit');
Route::delete('/reviews/{review}', [ReviewController::class, 'destroy'])->name('reviews.destroy');


Route::get('/explore', function () {
    return view('explore', ['title' => 'Explore']);
})->name('explore');

Route::get('/explore/culture', function () {
    return view('explore_culture', ['title' => 'Coastal Culture']);
})->name('explore.culture');

Route::get('/explore/facilities', function () {
    return view('explore_facilities', ['title' => 'Facilities']);
})->name('explore.facilities');

Route::get('/explore/gallery', function () {
    return view('explore_gallery', ['title' => 'Gallery']);
})->name('explore.gallery');

Route::get('/about', function () {
    return view('about');
})->name('about');



require __DIR__.'/auth.php';
