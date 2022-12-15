<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'judul' => 'required|max:300',
            'halaman' => 'required|numeric|min:1|max:1000',
            'kategori' => 'required|max:100',
            'penerbit' => 'required|max:100',
            'penulis' => 'required|max:100'
         ]);

        //$book = new Book();
        //$book->judul = $validateData['judul'];
        //$book->halaman = $validateData['halaman'];
        //$book->kategori = $validateData['kategori'];
        //$book->penerbit = $validateData['penerbit'];
        //$book->penulis = $validateData['penulis'];

        Book::create($validateData);

        $request->session()->flash('success', "Berhasi menambahkan {$validateData['judul']}!");
        return redirect()->route('books.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $validateData = $request->validate([
            'judul' => 'required|max:300',
            'halaman' => 'required|numeric|min:1|max:1000',
            'kategori' => 'required|max:100',
            'penerbit' => 'required|max:100',
            'penulis' => 'required|max:100'
         ]);

        Book::create($validateData);

        $request->session()
        ->flash('success', "Berhasi menngubah {$validateData['judul']}!");
        return redirect()->route('books.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with(
            'success', "Berhasil Menghapus {$book['judul']}!"
        );
    }
}
