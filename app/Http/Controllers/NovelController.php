<?php

namespace App\Http\Controllers;
use App\Models\Novel;
use Illuminate\Http\Request;

class NovelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $novels = Novel::all();
        return view('novels.index', compact('novels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('novels.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Memvalidasi data yang dikirim tidak boleh kosong
    $request->validate([
        'title' => 'required',
        'author' => 'required',
        'publisher' => 'required',
        'publication_year' => 'required|integer',
        'genre' => 'required',
        'reading_status' => 'required',
    ]);

    // Menyimpan ke database
    Novel::create($request->all());

    // Kembali ke halaman index dengan pesan sukses
    return redirect()->route('novels.index')->with('success', 'Data novel berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Novel $novel)
    {
       return view('novels.edit', compact('novel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Novel $novel)
    {
        // Memvalidasi data agar tidak ada yang dikosongkan saat diedit
    $request->validate([
        'title' => 'required',
        'author' => 'required',
        'publisher' => 'required',
        'publication_year' => 'required|integer',
        'genre' => 'required',
        'reading_status' => 'required',
    ]);

    // Menyimpan perubahan ke database
    $novel->update($request->all());

    // Kembali ke halaman index dengan pesan sukses
    return redirect()->route('novels.index')->with('success', 'Data novel berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Novel $novel)
    {
        // Menghapus data dari database
    $novel->delete();

    // Kembali ke halaman index dengan pesan sukses
    return redirect()->route('novels.index')->with('success', 'Data novel berhasil dihapus!');
    }
}
