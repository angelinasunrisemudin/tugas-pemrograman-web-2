<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AuthorController extends Controller
{
    public function index(): View
    {
        $authors = Author::latest()->get();

        return view('authors.index', compact('authors'));
    }

    public function create(): View
    {
        return view('authors.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'nama'        => ['required', 'string', 'max:255'],
            'email'       => ['required', 'email', 'max:255'],
            'negara_asal' => ['required', 'string', 'max:255'],
            'biografi'    => ['nullable', 'string'],
        ]);

        Author::create($validated);

        return redirect()->route('authors.index')
            ->with('success', 'Data penulis berhasil ditambahkan.');
    }
    public function edit(Author $author): View
    {
        return view('authors.edit', compact('author'));
    }

    public function update(Request $request, Author $author): RedirectResponse
    {
        $validated = $request->validate([
            'nama'        => ['required', 'string', 'max:255'],
            'email'       => ['required', 'email', 'max:255'],
            'negara_asal' => ['required', 'string', 'max:255'],
            'biografi'    => ['nullable', 'string'],
        ]);

        $author->update($validated);

        return redirect()->route('authors.index')
            ->with('success', 'Data penulis berhasil diperbarui.');
    }

    public function destroy(Author $author): RedirectResponse
    {
        $author->delete();

        return redirect()->route('authors.index')
            ->with('success', 'Data penulis berhasil dihapus.');
    }
    public function show(Author $author): View
    {
        $author->load('books');

        return view('authors.show', compact('author'));
    }
}
