@extends('layouts.main')

@section('title', 'Detail Mahasiswa')

@section('content')

<div class="container mt-4">

    <div class="card shadow">
        
        <div class="card-header bg-primary text-white">
            <h4>Detail Data Mahasiswa</h4>
        </div>

        <div class="card-body">

            <div class="mb-3">
                <label class="form-label">NIM</label>
                <input type="text" class="form-control" value="{{ $mahasiswa->nim }}" readonly>
            </div>

            <div class="mb-3">
                <label class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" value="{{ $mahasiswa->nama_lengkap }}" readonly>
            </div>

            <div class="mb-3">
                <label class="form-label">Tempat Lahir</label>
                <input type="text" class="form-control" value="{{ $mahasiswa->tempat_lahir }}" readonly>
            </div>

            <div class="mb-3">
                <label class="form-label">Tanggal Lahir</label>
                <input type="text" class="form-control" value="{{ \Carbon\Carbon::parse($mahasiswa->tgl_lahir)->format('d M Y') }}" readonly>
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" value="{{ $mahasiswa->email }}" readonly>
            </div>

            <div class="mb-3">
                <label class="form-label">Program Studi</label>
                <input type="text" class="form-control" value="{{ $mahasiswa->prodi }}" readonly>
            </div>

            <div class="mb-3">
                <label class="form-label">Alamat</label>
                <textarea rows="4" class="form-control" readonly>{{ $mahasiswa->alamat }}</textarea>
            </div>

            <a href="{{ route('mahasiswa.edit', $mahasiswa->id) }}" class="btn btn-warning">
                Edit
            </a>

            <a href="{{ route('mahasiswa.index') }}"
               class="btn btn-secondary">
                Kembali
            </a>

        </div>
    </div>

</div>

@endsection
