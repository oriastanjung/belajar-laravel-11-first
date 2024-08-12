<?php

use App\Http\Controllers\CatController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $imagesCarousel = [
        'https://images6.alphacoders.com/395/395453.jpg',
        'https://images7.alphacoders.com/133/1338270.png',
        'https://wallpaper.forfun.com/fetch/04/0459522bc2cc584ff0a816ccae010285.jpeg',
        'https://www.pixel4k.com/wp-content/uploads/2019/03/pink-waves-nature-landscape-4k_1551644676.jpg.webp',
        'https://wallpapercave.com/wp/wp9183309.jpg'
    ];
    return view('home', ['title' => 'Home Page', 'carousel' => $imagesCarousel]);
});


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
