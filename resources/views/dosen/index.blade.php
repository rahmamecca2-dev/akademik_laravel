@extends('layouts.main')

@section('title', 'Daftar Dosen')

@section('content')

<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Daftar Dosen Jurusan TI</h2>

        <a href="{{ route('dosen.create') }}" class="btn btn-success">
            + Tambah Dosen
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered align-middle">
                    
                    <thead class=" text-center">
                        <tr>
                            <th>No</th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Nomor Telpon</th>
                            <th>Prodi</th>
                            <th>Alamat</th>
                            <th width="180">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($dosen as $item)
                            <tr>
                                <td class="text-center">{{ $loop->iteration + ($dosen->currentPage() - 1) * $dosen->perPage() }}</td>
                                <td>{{ $item->nik }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->notelp }}</td>
                                <td>{{ $item->prodi }}</td>
                                <td>{{ $item->alamat }}</td>

                                <td class="text-center">
                                    <a href="{{ route('dosen.edit', $item->id) }}" class="btn btn-warning btn-sm me-1">
                                        Edit
                                    </a>

                                    <form action="{{ route('dosen.destroy', $item->id) }}" method="post" class="d-inline" onsubmit="return confirm('Hapus data dosen ini?');">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger btn-sm">Hapus</button>
                                    </form>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>

            <div class="mt-3">
                {{ $dosen->links() }}
            </div>

        </div>
    </div>

</div>


@endsection
