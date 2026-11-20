@extends('layouts.app')

@section('content')
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Daftar Buku (Book)</h3>
        <a href="{{ route('books.create') }}" class="btn btn-primary">Tambah Data</a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover text-center align-middle mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Judul Buku</th>
                            <th>Penulis (Author)</th>
                            <th>ISBN</th>
                            <th>Tahun Terbit</th>
                            <th>Jumlah Halaman</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($books as $book)
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <td class="text-start">{{ $book->judul }}</td>
                                <td>{{ $book->author?->nama ?? '-' }}</td>
                                <td>{{ $book->isbn }}</td>
                                <td>{{ $book->tahun_terbit }}</td>
                                <td>{{ $book->jumlah_halaman }}</td>
                                <td>Rp {{ number_format($book->harga, 0, ',', '.') }}</td>
                                <td>
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="{{ route('books.show', $book) }}" class="btn btn-sm btn-info">Detail</a>
                                        <a href="{{ route('books.edit', $book) }}" class="btn btn-sm btn-warning">Edit</a>
                                        <form action="{{ route('books.destroy', $book) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus data buku ini?')">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center">Belum ada data buku.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
