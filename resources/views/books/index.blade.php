@extends('layout.master')

@section('judul', 'Daftar Buku')

@push('css_after')
    <style>
        td{
            max-width: 0;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
    </style>
@endpush

@section('content')

{{ session()->get('success') }}

<div class="table-responsible">
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-6">
                    <h2>Daftar Buku</h2>
                </div>
                <div class="col-sm-6">
                    <a href="{{ route('books.create') }}" class="btn btn-success">
                        <i class="fa fa-plus fa-fw" aria-hidden="true"></i>
                        <span>Tambahkan Buku</span>
                    </a>
                </div>
            </div>
        </div>

        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Judul</th>
                    <th>Halaman</th>
                    <th>Kategori</th>
                    <th>Penerbit</th>
                    <th>Penulis</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($books as $book)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>
                        <a href="{{ route('books.show', $book->id) }}">
                            {{ $book->judul }}
                        </a>
                    </td>
                    <td>{{ $book->halaman }}</td>
                    <td>{{ $book->kategori }}</td>
                    <td>{{ $book->penerbit }}</td>
                    <td>{{ $book->penulis }}</td>
                </tr>
                @empty
                <tr>
                    <td align="center" colspan="6">No data yet.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
