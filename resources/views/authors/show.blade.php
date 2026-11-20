@extends('layouts.app')

@section('content')
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-info text-dark">
            <h5 class="mb-0">Detail Penulis (Author)</h5>
        </div>
        <div class="card-body">
            <table class="table table-bordered mb-3">
                <tr>
                    <th width="200">Nama Penulis</th>
                    <td>{{ $author->nama }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $author->email }}</td>
                </tr>
                <tr>
                    <th>Negara Asal</th>
                    <td>{{ $author->negara_asal }}</td>
                </tr>
                <tr>
                    <th>Biografi</th>
                    <td>{{ $author->biografi ?? '-' }}</td>
                </tr>
            </table>

            <a href="{{ route('authors.edit', $author) }}" class="btn btn-warning">Edit</a>
            <a href="{{ route('authors.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-header bg-dark text-white">
            <h6 class="mb-0">Daftar Buku Karya {{ $author->nama }} ({{ $author->books->count() }})</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped text-center align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Judul Buku</th>
                            <th>ISBN</th>
                            <th>Tahun Terbit</th>
                            <th>Jumlah Halaman</th>
                            <th>Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($author->books as $book)
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <td class="text-start">{{ $book->judul }}</td>
                                <td>{{ $book->isbn }}</td>
                                <td>{{ $book->tahun_terbit }}</td>
                                <td>{{ $book->jumlah_halaman }}</td>
                                <td>Rp {{ number_format($book->harga, 0, ',', '.') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">Belum ada buku yang terhubung dengan penulis ini.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
