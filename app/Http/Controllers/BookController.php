<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BookController extends Controller
{
    public function index(): View
    {
        $books = Book::with('author')->latest()->get();

        return view('books.index', compact('books'));
    }

    public function create(): View
    {
        $authors = Author::orderBy('nama')->get();

        return view('books.create', compact('authors'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'author_id'      => ['required', 'exists:authors,id'],
            'judul'          => ['required', 'string', 'max:255'],
            'isbn'           => ['required', 'string', 'max:50'],
            'tahun_terbit'   => ['required', 'integer', 'min:1000', 'max:2100'],
            'jumlah_halaman' => ['required', 'integer', 'min:1'],
            'harga'          => ['required', 'integer', 'min:0'],
            'sinopsis'       => ['nullable', 'string'],
        ], [
            'author_id.required'      => 'Penulis wajib dipilih.',
            'author_id.exists'        => 'Penulis yang dipilih tidak valid.',
            'judul.required'          => 'Judul buku wajib diisi.',
            'isbn.required'           => 'ISBN wajib diisi.',
            'tahun_terbit.required'   => 'Tahun terbit wajib diisi.',
            'tahun_terbit.integer'    => 'Tahun terbit harus berupa angka.',
            'tahun_terbit.min'        => 'Tahun terbit minimal 1000.',
            'tahun_terbit.max'        => 'Tahun terbit maksimal 2100.',
            'jumlah_halaman.required' => 'Jumlah halaman wajib diisi.',
            'jumlah_halaman.integer'  => 'Jumlah halaman harus berupa angka.',
            'jumlah_halaman.min'      => 'Jumlah halaman minimal 1.',
            'harga.required'          => 'Harga wajib diisi.',
            'harga.integer'           => 'Harga harus berupa angka.',
            'harga.min'               => 'Harga tidak boleh kurang dari 0.',
        ]);

        Book::create($validated);

        return redirect()->route('books.index')
            ->with('success', 'Data buku berhasil ditambahkan.');
    }

    public function edit(Book $book): View
    {
        $authors = Author::orderBy('nama')->get();

        return view('books.edit', compact('book', 'authors'));
    }

    public function update(Request $request, Book $book): RedirectResponse
    {
        $validated = $request->validate([
            'author_id'      => ['required', 'exists:authors,id'],
            'judul'          => ['required', 'string', 'max:255'],
            'isbn'           => ['required', 'string', 'max:50'],
            'tahun_terbit'   => ['required', 'integer', 'min:1000', 'max:2100'],
            'jumlah_halaman' => ['required', 'integer', 'min:1'],
            'harga'          => ['required', 'integer', 'min:0'],
            'sinopsis'       => ['nullable', 'string'],
        ], [
            'author_id.required'      => 'Penulis wajib dipilih.',
            'author_id.exists'        => 'Penulis yang dipilih tidak valid.',
            'judul.required'          => 'Judul buku wajib diisi.',
            'isbn.required'           => 'ISBN wajib diisi.',
            'tahun_terbit.required'   => 'Tahun terbit wajib diisi.',
            'tahun_terbit.integer'    => 'Tahun terbit harus berupa angka.',
            'tahun_terbit.min'        => 'Tahun terbit minimal 1000.',
            'tahun_terbit.max'        => 'Tahun terbit maksimal 2100.',
            'jumlah_halaman.required' => 'Jumlah halaman wajib diisi.',
            'jumlah_halaman.integer'  => 'Jumlah halaman harus berupa angka.',
            'jumlah_halaman.min'      => 'Jumlah halaman minimal 1.',
            'harga.required'          => 'Harga wajib diisi.',
            'harga.integer'           => 'Harga harus berupa angka.',
            'harga.min'               => 'Harga tidak boleh kurang dari 0.',
        ]);

        $book->update($validated);

        return redirect()->route('books.index')
            ->with('success', 'Data buku berhasil diperbarui.');
    }

    public function destroy(Book $book): RedirectResponse
    {
        $book->delete();

        return redirect()->route('books.index')
            ->with('success', 'Data buku berhasil dihapus.');
    }
}