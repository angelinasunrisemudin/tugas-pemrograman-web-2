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
                    <input type="text" name="title" value="{{ $novel->title }}" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Penulis</label>
                    <input type="text" name="author" value="{{ $novel->author }}" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Penerbit</label>
                    <input type="text" name="publisher" value="{{ $novel->publisher }}" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Tahun Terbit</label>
                    <input type="number" name="publication_year" value="{{ $novel->publication_year }}"
                        class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Genre</label>
                    <input type="text" name="genre" value="{{ $novel->genre }}" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Status Baca</label>
                    <select name="reading_status" class="form-control" required>
                        <option value="Belum Selesai" {{ $novel->reading_status == 'Belum Selesai' ? 'selected' : '' }}>
                            Belum Selesai</option>
                        <option value="Selesai Dibaca" {{ $novel->reading_status == 'Selesai Dibaca' ? 'selected' : '' }}>
                            Selesai Dibaca</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-warning">Update Data</button>
                <a href="{{ route('novels.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
@endsection
