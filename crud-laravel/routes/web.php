<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KategoriController;


Route::get('/', function () {
    return redirect()->route('produk.index');
});

Route::resource('kategori', KategoriController::class);

// Route resource otomatis membuatkan URL untuk semua fitur CRUD
Route::resource('produk', ProdukController::class);