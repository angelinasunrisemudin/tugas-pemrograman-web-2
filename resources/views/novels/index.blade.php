@extends('layouts.app')

@section('content')
    <!-- KODE NOTIFIKASI MULAI -->
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <!-- KODE NOTIFIKASI SELESAI -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Daftar Novel</h3>
        <!-- Tombol tambah akan berfungsi di tahap selanjutnya -->
        <a href="{{ route('novels.create') }}" class="btn btn-primary">Tambah Data</a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-bordered table-striped table-hover text-center mb-0">
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
                    @foreach ($novels as $novel)
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <td>{{ $novel->judul }}</td>
                            <td>{{ $novel->penulis }}</td>
                            <td>{{ $novel->penerbit }}</td>
                            <td>{{ $novel->tahun_terbit }}</td>
                            <td>{{ $novel->genre }}</td>

                            <!-- PERUBAHAN WARNA STATUS DIMULAI DI SINI -->
                            <td>
                                @if ($novel->status == 'Sudah Dibaca')
                                    <span class="badge bg-success">{{ $novel->status }}</span>
                                @else
                                    <span class="badge bg-secondary">{{ $novel->status }}</span>
                                @endif
                            </td>
                            <!-- PERUBAHAN WARNA STATUS SELESAI -->

                            <td>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('novels.edit', $novel) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('novels.destroy', $novel) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Apakah Anda yakin?')">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
