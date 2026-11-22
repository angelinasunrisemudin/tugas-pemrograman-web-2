@extends('layouts.app')

@section('content')
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Daftar Penulis (Author)</h3>
        <a href="{{ route('authors.create') }}" class="btn btn-primary text-nowrap">Tambah Data</a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table id="authors-table"
                    class="table table-bordered table-striped table-hover text-center align-middle mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th class="text-nowrap">Negara Asal</th>
                            <th>Biografi</th>
                            <th class="text-nowrap">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($authors as $author)
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <td>{{ $author->nama }}</td>
                                <td>{{ $author->email }}</td>
                                <td class="text-nowrap">{{ $author->negara_asal }}</td>
                                <td class="text-start">{{ $author->biografi }}</td>
                                <td class="text-nowrap">
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="{{ route('authors.show', $author) }}"
                                            class="btn btn-sm btn-info">Detail</a>
                                        <a href="{{ route('authors.edit', $author) }}"
                                            class="btn btn-sm btn-warning">Edit</a>
                                        <form action="{{ route('authors.destroy', $author) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus data penulis ini?')">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#authors-table').DataTable({
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.13.8/i18n/id.json'
                },
                columnDefs: [{
                    orderable: false,
                    searchable: false,
                    targets: -1
                }]
            });
        });
    </script>
@endpush
