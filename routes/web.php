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

Route::get('/employee-accounts', function () {
    return view('employee-accounts');
})->middleware(['auth', 'verified'])->name('employee-accounts');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
