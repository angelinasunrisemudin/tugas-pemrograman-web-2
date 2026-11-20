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
}