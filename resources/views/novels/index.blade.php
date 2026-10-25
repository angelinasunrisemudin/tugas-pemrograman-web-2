@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Daftar Novel</h3>
        <!-- Tombol tambah akan berfungsi di tahap selanjutnya -->
        <a href="{{ route('novels.create') }}" class="btn btn-primary">Tambah Data</a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-bordered table-striped text-center mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Penulis</th>
                        <th>Penerbit</th>
                        <th>Tahun</th>
                        <th>Genre</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($novels as $novel)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $novel->title }}</td>
                            <td>{{ $novel->author }}</td>
                            <td>{{ $novel->publisher }}</td>
                            <td>{{ $novel->publication_year }}</td>
                            <td>{{ $novel->genre }}</td>
                            <td>
                                <span
                                    class="badge {{ $novel->reading_status == 'Selesai Dibaca' ? 'bg-success' : 'bg-warning' }}">
                                    {{ $novel->reading_status }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('novels.edit', $novel->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('novels.destroy', $novel->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center text-muted">Belum ada data novel.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
