<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Fleet;

class FleetController extends Controller
{
    public function store(Request $request) {

        // Add cars in database

        $request->validate([
            'make' => 'required',
            'model' => 'required',
            'year' => 'required',
            'rent_price' => 'required',
            'description' => 'required',
        ]);
        Storage::disk('public')->putFileAs('cars', request('imageInput'), $id . "-" . request('make') . "-" . request('year') . "-" . str_replace(' ', '-', request('model')) . ".jpg", "public");
        return redirect('/fleet');
    }

    public function update(Request $request, int $id) {

        // Edit cars in database
        /*

        dd($files[0]);
        */

        Fleet::where(['id' => $id])->update([
            'make' => request('make'),
            'model' => request('model'),
            'year' => request('year'),
            'rent_price' => request('rent_price'),
            'description' => request('description'),
        ]);
        $files = $request->file('imageInput');
        for ($i = 0; $i < count($files); $i++) {
            Storage::disk('public')->putFileAs('cars', $files[$i], $id . "-" . request('make') . "-" . request('year') . "-" . str_replace(' ', '-', request('model')) . "-" . $i . ".jpg", "public");
        }

        return redirect('/view-car/' . $id);
    }

    public function editAvailability(Request $request, int $id) {
        if (Fleet::where('id', $id)->value('status') == 0) {
            Fleet::where('id', $id)->update(['status' => 1]);
        } else {
            Fleet::where('id', $id)->update(['status' => 0]);
        }
        return redirect()->back();
    }
}
