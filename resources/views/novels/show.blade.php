@extends('layouts.app')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header bg-info text-dark">
            <h5 class="mb-0">Detail Novel</h5>
        </div>
        <div class="card-body">
            <table class="table table-bordered mb-3">
                <tr>
                    <th width="200">Judul</th>
                    <td>{{ $novel->judul }}</td>
                </tr>
                <tr>
                    <th>Penulis</th>
                    <td>{{ $novel->penulis }}</td>
                </tr>
                <tr>
                    <th>Penerbit</th>
                    <td>{{ $novel->penerbit }}</td>
                </tr>
                <tr>
                    <th>Tahun Terbit</th>
                    <td>{{ $novel->tahun_terbit }}</td>
                </tr>
                <tr>
                    <th>Genre</th>
                    <td>{{ $novel->genre }}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>
                        @if ($novel->status == 'Sudah Dibaca')
                            <span class="badge bg-success">{{ $novel->status }}</span>
                        @else
                            <span class="badge bg-secondary">{{ $novel->status }}</span>
                        @endif
                    </td>
                </tr>
            </table>

            <a href="{{ route('novels.edit', $novel) }}" class="btn btn-warning">Edit</a>
            <a href="{{ route('novels.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
@endsection
