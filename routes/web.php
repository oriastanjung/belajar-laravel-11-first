<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CatController;
use App\Http\Controllers\PlaceController;
use App\Http\Middleware\AdminAuthMiddleware;
use App\Models\Place;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $imagesCarousel = [
        'https://images6.alphacoders.com/395/395453.jpg',
        'https://images7.alphacoders.com/133/1338270.png',
        'https://wallpaper.forfun.com/fetch/04/0459522bc2cc584ff0a816ccae010285.jpeg',
        'https://www.pixel4k.com/wp-content/uploads/2019/03/pink-waves-nature-landscape-4k_1551644676.jpg.webp',
        'https://wallpapercave.com/wp/wp9183309.jpg'
    ];


    $dataPlace = Place::all();

    return view('home', ['title' => 'Home Page', 'carousel' => $imagesCarousel, 'dataPlace' => $dataPlace]);
});


// Route untuk menampilkan detail tempat berdasarkan ID
Route::get('/places/{id}', [PlaceController::class, 'show'])->name('places.byid');



Route::get('/about', function () {
    return view('about', ['nama' => 'O. Riastanjung', 'title' => 'About Page']);
});


Route::get('blog', function () {
    $data = [[
        'title' => 'Artikel 1'
    ], [
        'title' => 'Artikel 2'
    ]];
    return view('blog', ['data' => $data, 'title' => 'Blog Page']);
});

Route::get('contact', function () {
    return view('contact', ['title' => 'Contact Page']);
});



Route::get('/cats', function () {
    $catController = new CatController();
    $data = $catController->getAllCatsData();

    return view('cats', ['data' => $data, 'title' => 'Cats Page']);
});



// admin routes

Route::get("/admin/login", function () {
    // Cek apakah admin sudah login
    if (Auth::guard('admin')->check()) {
        // Jika sudah login, redirect ke halaman dashboard
        return redirect()->route('admin.dashboard');
    }
    return view('admin.login.index', ['title' => 'Admin Login']);
});

// Rute untuk memproses login admin
Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login');
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

// Group untuk rute admin yang memerlukan middleware
Route::middleware([AdminAuthMiddleware::class])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.index', ['title' => 'Dashboard']);
    })->name('admin.dashboard');

    Route::get('/admin/places', function () {
        $data = Place::all();
        return view('admin.places.index', ['title' => 'Dashboard Places', 'places' => $data]);
    })->name('admin.places');

    Route::get('/admin/places/create', function(){
        return view('admin.places.create', ['title' => 'Create - Places']);
    })->name('places.create');

    Route::get('/admin/places/edit/{id}', function($id){
        $place = Place::findOrFail($id);
        return view('admin.places.edit', ['title' => 'Edit - Places', 'place' => $place]);
    })->name('places.edit');
    
    Route::put('/admin/places/{id}', [PlaceController::class, 'updateOne'])->name('places.update');


    Route::post('/admin/places/create', [PlaceController::class, 'createOnePlace'])->name('places.create');
    Route::delete('/admin/places/{id}', [PlaceController::class, 'deleteOne'])->name('places.destroy');
});