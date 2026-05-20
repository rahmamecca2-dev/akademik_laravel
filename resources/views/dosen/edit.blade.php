@extends('layouts.main')

@section('title', 'Edit Dosen')

@section('content')

<div class="container mt-4">

    <div class="card shadow">

        <div class="card-header bg-primary text-white">
            <h4>Edit Data Dosen</h4>
        </div>

        <div class="card-body">

            <form action="{{ route('dosen.update', $dosen->id) }}" method="POST">
                @csrf
                @method('PUT')

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="mb-3">
                    <label class="form-label">NIK</label>
                    <input type="text"
                           name="nik"
                           class="form-control"
                           value="{{ old('nik', $dosen->nik) }}"
                           placeholder="Masukkan NIK">
                </div>

                <div class="mb-3">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text"
                           name="nama"
                           class="form-control"
                           value="{{ old('nama', $dosen->nama) }}"
                           placeholder="Masukkan Nama">
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email"
                           name="email"
                           class="form-control"
                           value="{{ old('email', $dosen->email) }}"
                           placeholder="Masukkan Email">
                </div>

                <div class="mb-3">
                    <label class="form-label">Nomor Telepon</label>
                    <input type="text"
                           name="notelp"
                           class="form-control"
                           value="{{ old('notelp', $dosen->notelp) }}"
                           placeholder="Masukkan Nomor Telepon">
                </div>

                <div class="mb-3">
                    <label class="form-label">Program Studi</label>

                    <select name="prodi" class="form-select">
                        <option value="">-- Pilih Prodi --</option>
                        <option value="TRPL" {{ old('prodi', $dosen->prodi) == 'TRPL' ? 'selected' : '' }}>TRPL</option>
                        <option value="MI" {{ old('prodi', $dosen->prodi) == 'MI' ? 'selected' : '' }}>MI</option>
                        <option value="TK" {{ old('prodi', $dosen->prodi) == 'TK' ? 'selected' : '' }}>TK</option>
                        <option value="TEKKOM" {{ old('prodi', $dosen->prodi) == 'TEKKOM' ? 'selected' : '' }}>TEKKOM</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Alamat</label>

                    <textarea name="alamat"
                              rows="4"
                              class="form-control"
                              placeholder="Masukkan Alamat">{{ old('alamat', $dosen->alamat) }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">
                    Perbarui
                </button>

                <a href="{{ route('dosen.index') }}"
                   class="btn btn-secondary">
                    Kembali
                </a>

            </form>

        </div>
    </div>

</div>

@endsection
