<?php

use App\Http\Controllers\ProfileController;
use App\Models\Fleet;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/fleet', function () {
    $fleet_list = Fleet::all();
    return view('fleet', ['fleet_list' => $fleet_list]);
})->middleware(['auth', 'verified'])->name('fleet');

Route::post('/add_car', function () {

    // Add cars to database

    Fleet::create([
        'make' => request('make'),
        'model' => request('model'),
        'year' => request('year'),
        'rent_price' => request('rent_price'),

    ]);

    return redirect('/fleet');

})->middleware(['auth', 'verified'])->name('add-car');;

Route::get('/add_car', function () {
    $fleet_list = Fleet::all();
    return view('add-car');
})->middleware(['auth', 'verified'])->name('add-car');

Route::get('/employee-accounts', function () {
    return view('employee-accounts');
})->middleware(['auth', 'verified'])->name('employee-accounts');

Route::post('/edit-car/{id}', function ($id) {

    // Edit cars in database

    Fleet::where(['id' => $id])->update([
        'make' => request('make'),
        'model' => request('model'),
        'year' => request('year'),
        'rent_price' => request('rent_price'),

    ]);

    return redirect('/fleet');
})->middleware(['auth', 'verified'])->name('edit-car');

Route::get('/edit-car/{id}', function ($id) {
    $car_details = Fleet::where('id', $id)->get();
    return view('edit-car', ['car_details' => $car_details]);
})->middleware(['auth', 'verified'])->name('edit-car');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
