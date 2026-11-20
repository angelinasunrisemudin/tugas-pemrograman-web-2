@extends('layouts.app')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header bg-info text-dark">
            <h5 class="mb-0">Detail Buku (Book)</h5>
        </div>
        <div class="card-body">
            <table class="table table-bordered mb-3">
                <tr>
                    <th width="200">Judul Buku</th>
                    <td>{{ $book->judul }}</td>
                </tr>
                <tr>
                    <th>Penulis (Author)</th>
                    <td>
                        @if ($book->author)
                            <a href="{{ route('authors.show', $book->author) }}">{{ $book->author->nama }}</a>
                            ({{ $book->author->negara_asal }})
                        @else
                            -
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>ISBN</th>
                    <td>{{ $book->isbn }}</td>
                </tr>
                <tr>
                    <th>Tahun Terbit</th>
                    <td>{{ $book->tahun_terbit }}</td>
                </tr>
                <tr>
                    <th>Jumlah Halaman</th>
                    <td>{{ $book->jumlah_halaman }}</td>
                </tr>
                <tr>
                    <th>Harga</th>
                    <td>Rp {{ number_format($book->harga, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <th>Sinopsis</th>
                    <td>{{ $book->sinopsis ?? '-' }}</td>
                </tr>
            </table>

            <a href="{{ route('books.edit', $book) }}" class="btn btn-warning">Edit</a>
            <a href="{{ route('books.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
@endsection
