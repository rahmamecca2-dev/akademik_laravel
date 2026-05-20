@extends('layouts.main')

@section('title', 'Daftar Mahasiswa')

@section('content')

<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Daftar Mahasiswa Jurusan TI</h2>

        <a href="{{ route('mahasiswa.create') }}" class="btn btn-success">
            + Tambah Mahasiswa
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
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>Email</th>
                            <th>Prodi</th>
                            <th>Alamat</th>
                            <th width="180">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($mahasiswa as $item)
                            <tr>
                                <td class="text-center">{{ $loop->iteration + ($mahasiswa->currentPage() - 1) * $mahasiswa->perPage() }}</td>
                                <td>{{ $item->nim }}</td>
                                <td>{{ $item->nama_lengkap }}</td>
                                <td>{{ $item->tempat_lahir }}</td>

                                <td>
                                    {{ \Carbon\Carbon::parse($item->tgl_lahir)->format('d M Y') }}
                                </td>

                                <td>{{ $item->email }}</td>
                                <td>{{ $item->prodi }}</td>
                                <td>{{ $item->alamat }}</td>

                                <td class="text-center">
                                    <a href="{{ route('mahasiswa.show', $item->id) }}" class="btn btn-primary btn-sm me-1">
                                        Show
                                    </a>

                                    <a href="{{ route('mahasiswa.edit', $item->id) }}" class="btn btn-warning btn-sm me-1">
                                        Edit
                                    </a>

                                    <form action="{{ route('mahasiswa.destroy', $item->id) }}" method="post" class="d-inline" onsubmit="return confirm('Hapus data mahasiswa ini?');">
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
                {{ $mahasiswa->links() }}
            </div>

        </div>
    </div>

</div>


@endsection
