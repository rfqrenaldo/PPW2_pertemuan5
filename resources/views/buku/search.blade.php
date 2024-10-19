<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
>
</head>
<body>
    <div class="container mt-4">
        <h1 class="mb-4">Daftar Buku</h1>

        @if(Session::has('pesan'))
            <div class = "alert alert-success">{{ Session::get('pesan')}}</div>
        @endif

        @if(Session::has('pesan_hapus'))
            <div class = "alert alert-success">{{ Session::get('pesan_hapus')}}</div>
        @endif

        @if(Session::has('pesan_updated'))
            <div class = "alert alert-success">{{ Session::get('pesan_updated')}}</div>
        @endif

        @if(count($data_buku))
            <div class="alert alert-success">
                <strong>Ditemukan {{ count($data_buku) }}</strong> data dengan kata: <strong>{{ $cari }}</strong>
            </div>
        @else
            <div class="alert alert-warning">
                <h4>Data "{{ $cari }}" tidak ditemukan</h4>
                <a href="{{ route('buku.index') }}" class="btn btn-warning">Kembali</a>
            </div>
        @endif





        <div class="container d-flex flex-row justify-content-between align-items-end mb-3">

            <a href="{{ route('buku.create') }}" class="btn btn-primary" >Tambah Buku</a>

            <form action="{{ route('buku.search') }}" method="get" class="d-flex flex-row">
                @csrf
                <input type="text" name="kata" class="form-control me-3 " placeholder="Cari">
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
        </div>

        <table class="table table-bordered table-hover" border="1">
            <thead class="table-dark">
                <tr>
                    <th>Id</th>
                    <th>Judul Buku</th>
                    <th>Penulis</th>
                    <th>Harga</th>
                    <th>Tanggal Terbit</th>
                    <th>Hapus</th>
                    <th>update</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data_buku as $index => $buku)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $buku->judul }}</td>
                    <td>{{ $buku->penulis }}</td>
                    <td>{{ "Rp.".number_format($buku->harga, 2, ',', '.') }}</td>
                    <td>{{ \Carbon\Carbon::parse($buku->tgl_terbit)->format('d-m-Y') }}</td>
                    <td>
                        <form action="{{ route('buku.destroy', $buku->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('yakin mau dihapus?')" type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                    <td>
                        <a href="{{ route('buku.edit', $buku->id) }}" class="btn btn-warning">Edit</a>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>


        <div>{{ $data_buku->links() }}</div>
        <div><strong>Jumlah Buku: {{ $jumlah_buku }}</strong></div>

        <div class="alert alert-info mt-4">
            <p><strong>JUMLAH BUKU:</strong> {{ $jumlah_buku }}</p>
            <p><strong>Total Harga Semua Buku:</strong> {{ "Rp.".number_format($total_harga, 2, ',', '.') }}</p>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
