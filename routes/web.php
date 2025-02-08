<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Fleet;
use App\Models\User;
use App\Http\Controllers\FleetController;
use Illuminate\Support\Facades\Storage;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/fleet', function () {
    return view('fleet', ['fleet_list' => $fleet_list = Fleet::all()]);
})->middleware(['auth', 'verified'])->name('fleet');

Route::post('/add_car', [FleetController::class, 'store'])->middleware(['auth', 'verified'])->name('add-car');;

Route::get('/add_car', function () {
    return view('add-car');
})->middleware(['auth', 'verified'])->name('add-car');

Route::get('/employee-accounts', function () {
    $accounts = User::all();
    return view('employee-accounts', ['accounts' => $accounts]);
})->middleware(['auth', 'verified'])->name('employee-accounts');

Route::get('/view-car/{id}', function ($id) {
    $carDetails = Fleet::where('id', $id)->get();
    return view('view-car', ['car_details' => $carDetails]);
})->middleware(['auth', 'verified'])->name('view-car');

Route::post('/edit-car/{id}', [FleetController::class, 'update'])->middleware(['auth', 'verified'])->name('edit-car');

Route::get('/edit-car/{id}', function ($id) {
    $car_details = Fleet::where('id', $id)->get();
    return view('edit-car', ['car_details' => $car_details]);
})->middleware(['auth', 'verified'])->name('edit-car');

Route::get('/fleet/edit-car-availability/{id}', [FleetController::class, 'editAvailability'])->middleware(['auth', 'verified'])->name('edit-car-availability');

Route::get('/view-car/edit-car-availability/{id}', [FleetController::class, 'editAvailability'])->middleware(['auth', 'verified'])->name('edit-car-availability');

Route::get('/delete-user/{id}', function ($id) {
    return view('delete-user-form', ['id' => $id]);
});

Route::get('/update-status/{id}', function ($id) {
    $userDetails = User::where('id', $id)->get();
    if(User::where('is_admin', 1)->count() > 2){
        if ($userDetails->value('is_admin') == 1) {
            User::where('id', $id)->update(['is_admin' => 0]);
        } else {
            User::where('id', $id)->update(['is_admin' => 1]);
        }
        return redirect('/employee-accounts');
    } else {
        return redirect('/employee-accounts?status=failed');
    }
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile-delete/{id}', [ProfileController::class, 'destroy'])->name('profile-delete');
});

Route::delete('/delete-car/{id}', function ($id){
    Fleet::where('id', $id)->delete();
    return redirect('/fleet');
})->middleware(['auth', 'verified'])->name('delete-car');

require __DIR__.'/auth.php';
