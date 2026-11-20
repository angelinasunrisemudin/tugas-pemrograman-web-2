@extends('layouts.app')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Tambah Buku (Book) Baru</h5>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('books.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="author_id" class="form-label">Penulis (Author)</label>
                    <select id="author_id" name="author_id" class="form-select" required>
                        <option value="">-- Pilih Penulis --</option>
                        @foreach ($authors as $author)
                            <option value="{{ $author->id }}" {{ old('author_id') == $author->id ? 'selected' : '' }}>
                                {{ $author->nama }} ({{ $author->negara_asal }})
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="judul" class="form-label">Judul Buku</label>
                    <input type="text" id="judul" name="judul" class="form-control" value="{{ old('judul') }}"
                        required>
                </div>

                <div class="mb-3">
                    <label for="isbn" class="form-label">ISBN</label>
                    <input type="text" id="isbn" name="isbn" class="form-control" value="{{ old('isbn') }}"
                        required>
                </div>

                <div class="mb-3">
                    <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
                    <input type="number" id="tahun_terbit" name="tahun_terbit" class="form-control"
                        value="{{ old('tahun_terbit') }}" required>
                </div>

                <div class="mb-3">
                    <label for="jumlah_halaman" class="form-label">Jumlah Halaman</label>
                    <input type="number" id="jumlah_halaman" name="jumlah_halaman" class="form-control"
                        value="{{ old('jumlah_halaman') }}" required>
                </div>

                <div class="mb-3">
                    <label for="harga" class="form-label">Harga (Rp)</label>
                    <input type="number" id="harga" name="harga" class="form-control" value="{{ old('harga') }}"
                        required>
                </div>

                <div class="mb-3">
                    <label for="sinopsis" class="form-label">Sinopsis</label>
                    <textarea id="sinopsis" name="sinopsis" rows="4" class="form-control">{{ old('sinopsis') }}</textarea>
                </div>

                <button type="submit" class="btn btn-success">Simpan Data</button>
                <a href="{{ route('books.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
@endsection
