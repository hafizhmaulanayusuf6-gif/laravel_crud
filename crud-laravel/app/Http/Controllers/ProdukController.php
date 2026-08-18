<?php

namespace App\Http\Controllers;

use App\Models\Produk; // Pastikan ini ada untuk memanggil Model
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    // 1. Menampilkan semua data (Fungsi yang tadi dicari oleh Laravel)
    public function index()
    {
        $produks = Produk::all(); 
        return view('produk.index', compact('produks')); 
    }

    // 2. Menampilkan halaman form tambah data
    public function create()
    {
        return view('produk.create');
    }

    // 3. Menyimpan data dari form ke database (Fungsi yang sudah kita perbaiki tadi)
    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'nama_produk' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
        ]);

        // Simpan data
        Produk::create($request->all());

        // Kembali ke halaman index dengan pesan sukses
        return redirect()->route('produk.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    // (Fungsi edit, update, destroy bisa ditambahkan nanti)
}