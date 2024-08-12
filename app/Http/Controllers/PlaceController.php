<?php

namespace App\Http\Controllers;

use App\Models\Place;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PlaceController extends Controller
{
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

        // Variabel untuk menyimpan path thumbnail
        $thumbnailUrl = '';

        // Mengunggah thumbnail
        if ($request->hasFile('thumbnail')) {
            // Unggah thumbnail baru dan ambil nama file
            $thumbnailUrl = $request->file('thumbnail')->store('public/thumbnails');
            // Convert path to relative URL for storage
            $thumbnailUrl = str_replace('public/', '', $thumbnailUrl);
        }

        // Membuat data tempat
        Place::create([
            'name' => $request->input('name'),
            'location' => $request->input('location'),
            'price' => $request->input('price'),
            'stars' => $request->input('stars'),
            'thumbnail' => $thumbnailUrl,  // Simpan path relatif
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

        // Variabel untuk menyimpan path thumbnail
        $thumbnailUrl = $place->thumbnail;

        // Jika ada file thumbnail baru
        if ($request->hasFile('thumbnail')) {
            // Hapus thumbnail lama jika ada
            if ($place->thumbnail && Storage::exists('public/' . $place->thumbnail)) {
                Storage::delete('public/' . $place->thumbnail);
            }

            // Unggah thumbnail baru dan ambil nama file
            $thumbnailUrl = $request->file('thumbnail')->store('public/thumbnails');
            // Convert path to relative URL for storage
            $thumbnailUrl = str_replace('public/', '', $thumbnailUrl);
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
        if ($place->thumbnail && Storage::exists('public/' . $place->thumbnail)) {
            Storage::delete('public/' . $place->thumbnail);
        }

        // Hapus tempat
        $place->delete();

        return redirect()->route('admin.places')->with('success', 'Place deleted successfully.');
    }
}
