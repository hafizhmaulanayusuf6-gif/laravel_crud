<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\ProdukController;

// Route resource otomatis membuatkan URL untuk semua fitur CRUD
Route::resource('produk', ProdukController::class);