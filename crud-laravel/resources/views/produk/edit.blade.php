<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">

    <h2>Edit Produk</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('produk.update', $produk->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nama Produk:</label>
            <input type="text" name="nama_produk" class="form-control" value="{{ old('nama_produk', $produk->nama_produk) }}" required>
        </div>

        <div class="mb-3">
            <label>Harga:</label>
            <input type="number" name="harga" class="form-control" value="{{ old('harga', $produk->harga) }}" required>
        </div>

        <div class="mb-3">
            <label>Stok:</label>
            <input type="number" name="stok" class="form-control" value="{{ old('stok', $produk->stok) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Data</button>
        <a href="{{ route('produk.index') }}" class="btn btn-secondary">Batal</a>
    </form>

</div>
</body>
</html>