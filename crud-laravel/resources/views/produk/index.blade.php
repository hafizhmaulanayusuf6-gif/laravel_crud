<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">

    <h2>Daftar Produk</h2>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif

    <a href="{{ route('produk.create') }}" class="btn btn-primary mb-3">+ Tambah Produk</a>
    <a href="{{ route('kategori.index') }}" class="btn btn-outline-dark mb-3">Kelola Kategori</a>

    <form action="{{ route('produk.index') }}" method="GET" class="mb-3 d-flex gap-2">
        <input type="text" name="search" class="form-control" placeholder="Cari nama produk..." value="{{ request('search') }}">
        <button type="submit" class="btn btn-outline-primary">Cari</button>
        @if (request('search'))
        <a href="{{ route('produk.index') }}" class="btn btn-outline-secondary">Reset</a>
        @endif
    </form>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Kategori</th>
                <th>Nama Produk</th>
                <th>
                    <a href="{{ route('produk.index', ['search' => request('search'), 'sort' => 'harga', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc']) }}" class="text-dark text-decoration-none">
                        Harga
                        @if(request('sort') == 'harga')
                        {{ request('direction') == 'asc' ? '▲' : '▼' }}
                        @endif
                    </a>
                </th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($produks as $index => $p)
            <tr>
                <td>{{ $produks->firstItem() + $index }}</td>
                <td>{{ $p->kategori->nama_kategori ?? '-' }}</td>
                <td>{{ $p->nama_produk }}</td>
                <td>Rp {{ number_format($p->harga, 0, ',', '.') }}</td>
                <td>{{ $p->stok }}</td>
                <td>
                    <a href="{{ route('produk.edit', $p->id) }}" class="btn btn-sm btn-warning">Edit</a>

                    <form action="{{ route('produk.destroy', $p->id) }}" method="POST" style="display:inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger"
                            onclick="return confirm('Yakin ingin menghapus produk ini?')">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">Belum ada data produk.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-3">
        {{ $produks->links('pagination::bootstrap-5') }}
    </div>

</div>
</body>
</html>