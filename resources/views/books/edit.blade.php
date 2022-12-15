@extends('layout.master')

@section('judul', 'Edit Buku')

@section('content')
<h2>Update Buku</h2>
<form action="" method="POST">
    @method('PATCH')
    @csrf
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="judul">Judul</label>
            <input type="text" class="form-control @error('judul') is-invalid @enderror"
            name="judul" id="judul" value="{{ old('judul') ?? $book->judul }}">
            @error('judul')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-6 mb-3">
            <label for="halaman">Halaman</label>
            <input type="number" class="form-control @error('halaman')
                is-invalid
            @enderror"
            name="halaman" id="halaman" min="1" max="1000" value="{{ old('halaman') ?? $book->halaman  }}">
            @error('halaman')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-6 mb-3">
            <label for="kategori">Kategori</label>
            <input type="text" class="form-control @error('kategori') is-invalid @enderror"
            name="kategori" id="kategori" value="{{ old('kategori') ?? $book->kategori }}">
            @error('kategori')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-6 mb-3">
            <label for="penerbit">Penerbit</label>
            <input type="text" class="form-control @error('penerbit') is-invalid @enderror"
            name="penerbit" id="penerbit" value="{{ old('penerbit') ?? $book->penerbit }}">
            @error('penerbit')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-6 mb-3">
            <label for="penulis">Penulis</label>
            <input type="text" class="form-control @error('penulis') is-invalid @enderror"
            name="penulis" id="penulis" value="{{ old('penulis') ?? $book->penulis }}">
            @error('penulis')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <button class="btn btn-primary btn-lg btn-block" type="submit">Update</button>
</form>
@endsection
