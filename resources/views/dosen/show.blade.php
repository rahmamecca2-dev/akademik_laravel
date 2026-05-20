@extends('layouts.main')

@section('title', 'Detail Dosen')

@section('content')

<div class="container mt-4">

    <div class="card shadow">
        
        <div class="card-header bg-primary text-white">
            <h4>Detail Data Dosen</h4>
        </div>

        <div class="card-body">

            <div class="mb-3">
                <label class="form-label">NIK</label>
                <input type="text" class="form-control" value="{{ $dosen->nik }}" readonly>
            </div>

            <div class="mb-3">
                <label class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" value="{{ $dosen->nama }}" readonly>
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" value="{{ $dosen->email }}" readonly>
            </div>

            <div class="mb-3">
                <label class="form-label">Nomor Telpon</label>
                <input type="text" class="form-control" value="{{ $dosen->notelp }}" readonly>
            </div>

            <div class="mb-3">
                <label class="form-label">Program Studi</label>
                <input type="text" class="form-control" value="{{ $dosen->prodi }}" readonly>
            </div>

            <div class="mb-3">
                <label class="form-label">Alamat</label>
                <textarea rows="4" class="form-control" readonly>{{ $dosen->alamat }}</textarea>
            </div>

            <a href="{{ route('dosen.edit', $dosen->id) }}" class="btn btn-warning">
                Edit
            </a>

            <a href="{{ route('dosen.index') }}"
               class="btn btn-secondary">
                Kembali
            </a>

        </div>
    </div>

</div>

@endsection
