<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div class="container">
    <h1>Edit Buku</h1>
    <form method="POST" action="{{ route('buku.update', $buku->id) }}">
        @csrf
        @method('PUT')
        <div>
            Judul: <input type="text" name="judul" value="{{ $buku->judul }}" class="form-control">
        </div>
        <div>
            Penulis: <input type="text" name="penulis" value="{{ $buku->penulis }}" class="form-control">
        </div>
        <div>
            Harga: <input type="text" name="harga" value="{{ $buku->harga }}" class="form-control">
        </div>
        <div>
            Tanggal Terbit: <input type="date" name="tgl_terbit" value="{{ $buku->tgl_terbit }}" class="form-control">
        </div>
        <button type="submit" class="btn btn-success mt-3">Update</button>
    </form>
</div>
</body>
</html>
