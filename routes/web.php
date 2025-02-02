<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Fleet;
use App\Models\User;

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
        'description' => request('description'),
        'status' => 0,
    ]);

    return redirect('/fleet');

})->middleware(['auth', 'verified'])->name('add-car');;

Route::get('/add_car', function () {
    $fleet_list = Fleet::all();
    return view('add-car');
})->middleware(['auth', 'verified'])->name('add-car');

Route::get('/employee-accounts', function () {
    $accounts = User::all();
    return view('employee-accounts', ['accounts' => $accounts]);
})->middleware(['auth', 'verified'])->name('employee-accounts');

Route::get('/view-car/{id}', function ($id) {
    $car_details = Fleet::where('id', $id)->get();
    return view('view-car', ['car_details' => $car_details]);
})->middleware(['auth', 'verified'])->name('view-car');

Route::post('/edit-car/{id}', function ($id) {

    // Edit cars in database

    Fleet::where(['id' => $id])->update([
        'make' => request('make'),
        'model' => request('model'),
        'year' => request('year'),
        'rent_price' => request('rent_price'),
        'description' => request('description'),
    ]);

    return redirect('/view-car/' . $id);
})->middleware(['auth', 'verified'])->name('edit-car');

Route::get('/edit-car/{id}', function ($id) {
    $car_details = Fleet::where('id', $id)->get();
    return view('edit-car', ['car_details' => $car_details]);
})->middleware(['auth', 'verified'])->name('edit-car');

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

require __DIR__.'/auth.php';
