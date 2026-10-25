@extends('layouts.app')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Tambah Novel Baru</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('novels.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label>Judul Novel</label>
                    <input type="text" name="title" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Penulis</label>
                    <input type="text" name="author" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Penerbit</label>
                    <input type="text" name="publisher" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Tahun Terbit</label>
                    <input type="number" name="publication_year" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Genre</label>
                    <input type="text" name="genre" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Status Baca</label>
                    <select name="reading_status" class="form-control" required>
                        <option value="">-- Pilih Status --</option>
                        <option value="Belum Selesai">Belum Selesai</option>
                        <option value="Selesai Dibaca">Selesai Dibaca</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-success">Simpan Data</button>
                <a href="{{ route('novels.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
@endsection
