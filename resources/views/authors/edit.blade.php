@extends('layouts.app')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header bg-warning">
            <h5 class="mb-0">Edit Data Penulis (Author)</h5>
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

            <form action="{{ route('authors.update', $author->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Penulis</label>
                    <input type="text" id="nama" name="nama" class="form-control"
                        value="{{ old('nama', $author->nama) }}" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="email" class="form-control"
                        value="{{ old('email', $author->email) }}" required>
                </div>

                <div class="mb-3">
                    <label for="negara_asal" class="form-label">Negara Asal</label>
                    <input type="text" id="negara_asal" name="negara_asal" class="form-control"
                        value="{{ old('negara_asal', $author->negara_asal) }}" required>
                </div>

                <div class="mb-3">
                    <label for="biografi" class="form-label">Biografi</label>
                    <textarea id="biografi" name="biografi" rows="4" class="form-control">{{ old('biografi', $author->biografi) }}</textarea>
                </div>

                <button type="submit" class="btn btn-warning">Update Data</button>
                <a href="{{ route('authors.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
@endsection
