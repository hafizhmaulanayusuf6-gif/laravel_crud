Tambah Produk


    Tambah Produk Baru

    
    @if ($errors->any())
        
            
                @foreach ($errors->all() as $error)
                    {{ $error }}
                @endforeach
            
        
    @endif

    
    
        @csrf 
        
        Nama Produk:
        

        Harga:
        

        Stok:
        

        Simpan Data
        Batal