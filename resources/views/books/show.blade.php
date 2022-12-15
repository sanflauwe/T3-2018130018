@extends('layout.master')

@section('judul', $book->judul)

@section('content')
<div class="col-md-12">
    <div class="col-md-8">
        <h2>{{ $book->judul }}</h2>
    </div>
    <div class="col-md-4">
        <div class="float-right">
            <div class="btn-group" role="group">
                <a href="{{ route('books.edit', $book->id) }}"
                class="btn btn-primary ml-3">Edit</a>

                <form action="{{ route('books.destroy', $book->id) }}" method="POST">
                    <button type="submit" class="btn btn-danger ml-3">Hapus</button>
                    @method('DELETE')
                    @csrf
                </form>
        </div>
    </div>
    <h5>
        <span class="badge badge-primary">
            <i class="fa fa-star fa-fw"></i>
            {{ $book->halaman }}
        </span>
    </h5>
    <h5>
        <span class="badge badge-primary">
            <i class="fa fa-star fa-fw"></i>
            {{ $book->kategori }}
        </span>
    </h5>
    <hr>
</div>
@endsection
