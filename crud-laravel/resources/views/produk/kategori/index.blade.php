<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Kategori</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">

    <h2>Daftar Kategori</h2>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif

    <a href="{{ route('produk.index') }}" class="btn btn-secondary mb-3">← Kembali ke Produk</a>
    <a href="{{ route('kategori.create') }}" class="btn btn-primary mb-3">+ Tambah Kategori</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($kategoris as $index => $k)
            <tr>
                <td>{{ $kategoris->firstItem() + $index }}</td>
                <td>{{ $k->nama_kategori }}</td>
                <td>
                    <a href="{{ route('kategori.edit', $k->id) }}" class="btn btn-sm btn-warning">Edit</a>

                    <form action="{{ route('kategori.destroy', $k->id) }}" method="POST" style="display:inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger"
                            onclick="return confirm('Yakin ingin menghapus kategori ini? Produk yang memakainya akan kehilangan kategori.')">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="3" class="text-center">Belum ada kategori.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-3">
        {{ $kategoris->links('pagination::bootstrap-5') }}
    </div>

</div>
</body>
</html>