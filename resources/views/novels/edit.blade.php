@extends('layouts.app')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header bg-warning">
            <h5 class="mb-0">Edit Data Novel</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('novels.update', $novel->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label>Judul Novel</label>
                    <input type="text" name="judul" class="form-control" value="{{ old('judul', $novel->judul) }}"
                        required>
                </div>

                <div class="mb-3">
                    <label>Penulis</label>
                    <input type="text" name="penulis" class="form-control" value="{{ old('penulis', $novel->penulis) }}"
                        required>
                </div>

                <div class="mb-3">
                    <label>Penerbit</label>
                    <input type="text" name="penerbit" class="form-control"
                        value="{{ old('penerbit', $novel->penerbit) }}" required>
                </div>

                <div class="mb-3">
                    <label>Tahun Terbit</label>
                    <input type="number" name="tahun_terbit" class="form-control"
                        value="{{ old('tahun_terbit', $novel->tahun_terbit) }}" required>
                </div>

                <div class="mb-3">
                    <label>Genre</label>
                    <input type="text" name="genre" class="form-control" value="{{ old('genre', $novel->genre) }}"
                        required>
                </div>

                <div class="mb-3">
                    <label>Status Baca</label>
                    <select name="status" class="form-control" required>
                        <option value="Sudah Dibaca"
                            {{ old('status', $novel->status) == 'Sudah Dibaca' ? 'selected' : '' }}>Sudah Dibaca</option>
                        <option value="Belum Dibaca"
                            {{ old('status', $novel->status) == 'Belum Dibaca' ? 'selected' : '' }}>Belum Dibaca</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-warning">Update Data</button>
                <a href="{{ route('novels.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
@endsection
