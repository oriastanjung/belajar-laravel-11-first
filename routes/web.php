<?php

use App\Http\Controllers\CatController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});


Route::get('/about', function () {
    return view('about', ['nama' => 'O. Riastanjung']);
});


Route::get('blog', function () {
    $data = [[
        'title' => 'Artikel 1'
    ], [
        'title' => 'Artikel 2'
    ]];
    return view('blog', ['data' => $data]);
});

Route::get('contact', function () {
    return view('contact');
});



Route::get('/cats', function(){
    $catController = new CatController();
    $data = $catController->getAllCatsData();

    return view('cats', ['data' => $data]);
});