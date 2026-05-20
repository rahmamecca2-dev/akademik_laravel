@extends('layouts.main')

@section('title', 'Tambah Mahasiswa')

@section('content')

<div class="container mt-4">

    <div class="card shadow">
        
        <div class="card-header bg-primary text-white">
            <h4>Form Tambah Mahasiswa</h4>
        </div>

        <div class="card-body">

            <form action="{{ route('mahasiswa.store') }}" method="POST">
                @csrf

                {{-- NIM --}}
                <div class="mb-3">
                    <label class="form-label">NIM</label>
                    <input type="text" 
                           name="nim" 
                           class="form-control"
                           placeholder="Masukkan NIM">
                </div>

                {{-- Nama --}}
                <div class="mb-3">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text" 
                           name="nama_lengkap" 
                           class="form-control"
                           placeholder="Masukkan Nama">
                </div>

                {{-- Tempat Lahir --}}
                <div class="mb-3">
                    <label class="form-label">Tempat Lahir</label>
                    <input type="text" 
                           name="tempat_lahir" 
                           class="form-control"
                           placeholder="Masukkan Tempat Lahir">
                </div>

                {{-- Tanggal Lahir --}}
                <div class="mb-3">
                    <label class="form-label">Tanggal Lahir</label>

                    <div class="row">

                        {{-- Tanggal --}}
                        <div class="col-md-4">
                            <select name="tanggal" class="form-select">
                                <option value="">Tanggal</option>

                                @for ($i = 1; $i <= 31; $i++)
                                    <option value="{{ $i }}">
                                        {{ $i }}
                                    </option>
                                @endfor

                            </select>
                        </div>

                        {{-- Bulan --}}
                        <div class="col-md-4">
                            <select name="bulan" class="form-select">
                                <option value="">Bulan</option>

                                @php
                                    $bulan = [
                                        'Januari',
                                        'Februari',
                                        'Maret',
                                        'April',
                                        'Mei',
                                        'Juni',
                                        'Juli',
                                        'Agustus',
                                        'September',
                                        'Oktober',
                                        'November',
                                        'Desember'
                                    ];
                                @endphp

                                @foreach ($bulan as $key => $value)
                                    <option value="{{ $key + 1 }}">
                                        {{ $value }}
                                    </option>
                                @endforeach

                            </select>
                        </div>

                        {{-- Tahun --}}
                        <div class="col-md-4">
                            <select name="tahun" class="form-select">
                                <option value="">Tahun</option>

                                @for ($i = date('Y'); $i >= 1900; $i--)
                                    <option value="{{ $i }}">
                                        {{ $i }}
                                    </option>
                                @endfor

                            </select>
                        </div>

                    </div>
                </div>

                {{-- Email --}}
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" 
                           name="email" 
                           class="form-control"
                           placeholder="Masukkan Email">
                </div>

                {{-- Prodi --}}
                <div class="mb-3">
                    <label class="form-label">Program Studi</label>

                    <select name="prodi" class="form-select">
                        <option value="">-- Pilih Prodi --</option>
                        <option value="TRPL">TRPL</option>
                        <option value="MI">MI</option>
                        <option value="TK">TK</option>
                        <option value="TEKKOM">TEKKOM</option>
                    </select>
                </div>

                {{-- Alamat --}}
                <div class="mb-3">
                    <label class="form-label">Alamat</label>

                    <textarea name="alamat"
                              rows="4"
                              class="form-control"
                              placeholder="Masukkan Alamat"></textarea>
                </div>

                {{-- Tombol --}}
                <button type="submit" class="btn btn-primary">
                    Simpan
                </button>

                <a href="{{ route('mahasiswa.index') }}"
                   class="btn btn-secondary">
                    Kembali
                </a>

            </form>

        </div>
    </div>

</div>

@endsection