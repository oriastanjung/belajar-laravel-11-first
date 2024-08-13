<?php

namespace App\Http\Controllers;

use App\Models\Place;
use Illuminate\Http\Request;

class PlaceController extends Controller
{

    // Method untuk menampilkan detail tempat berdasarkan ID
    public function show($id)
    {
        $place = Place::findOrFail($id);
        return view('places.detail', ['place' => $place]);
    }

    public function createOnePlace(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'price' => 'required|numeric',
            'stars' => 'required|numeric|min:1|max:5',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // max 2MB
        ]);

        // Variabel untuk menyimpan URL thumbnail
        $thumbnailUrl = '';

        // Mengunggah thumbnail
        if ($request->hasFile('thumbnail')) {
            // Simpan file ke folder public/thumbnails dengan nama asli file
            $file = $request->file('thumbnail');
            $filename = time() . '_' . $file->getClientOriginalName(); // Menghindari duplikasi nama file
            $file->move(public_path('thumbnails'), $filename);
            $thumbnailUrl = 'thumbnails/' . $filename;
        }

        // Membuat data tempat
        Place::create([
            'name' => $request->input('name'),
            'location' => $request->input('location'),
            'price' => $request->input('price'),
            'stars' => $request->input('stars'),
            'thumbnail' => $thumbnailUrl,  // Simpan URL relatif
        ]);

        return redirect()->route('admin.places')->with('success', 'Place created successfully.');
    }

    public function updateOne(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'price' => 'required|numeric',
            'stars' => 'required|numeric|min:1|max:5',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // max 2MB
        ]);

        // Temukan tempat berdasarkan ID
        $place = Place::findOrFail($id);

        // Variabel untuk menyimpan URL thumbnail
        $thumbnailUrl = $place->thumbnail;

        // Jika ada file thumbnail baru
        if ($request->hasFile('thumbnail')) {
            // Hapus thumbnail lama jika ada
            if ($place->thumbnail && file_exists(public_path($place->thumbnail))) {
                unlink(public_path($place->thumbnail));
            }

            // Simpan file baru ke folder public/thumbnails
            $file = $request->file('thumbnail');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('thumbnails'), $filename);
            $thumbnailUrl = 'thumbnails/' . $filename;
        }

        // Perbarui data tempat
        $place->update([
            'name' => $request->input('name'),
            'location' => $request->input('location'),
            'price' => $request->input('price'),
            'stars' => $request->input('stars'),
            'thumbnail' => $thumbnailUrl,
        ]);

        return redirect()->route('admin.places')->with('success', 'Place updated successfully.');
    }

    public function deleteOne($id)
    {
        // Temukan tempat berdasarkan ID
        $place = Place::findOrFail($id);

        // Hapus thumbnail jika ada
        if ($place->thumbnail && file_exists(public_path($place->thumbnail))) {
            unlink(public_path($place->thumbnail));
        }

        // Hapus tempat
        $place->delete();

        return redirect()->route('admin.places')->with('success', 'Place deleted successfully.');
    }
}
