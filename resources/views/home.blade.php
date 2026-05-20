@extends('layouts.main')

@section('title', 'Home')

@section('content')

<div class="container py-5">

    {{-- Hero Section --}}
    <div class="p-5 mb-5 bg-primary text-white rounded-4 shadow hero-section">

        <div class="row align-items-center">

            <div class="col-md-8">
                <div class="hero-kicker">
                    <i class="bi bi-stars"></i>
                    Portal Akademik Jurusan TI
                </div>

                <h1 class="display-4 fw-bold">
                    Sistem Informasi Mahasiswa
                </h1>

                <p class="lead mt-3">
                    Website pengelolaan data mahasiswa Jurusan Teknologi Informasi
                    menggunakan Laravel dan Bootstrap.
                </p>

                <div class="mt-4">
                    <a href="{{ route('mahasiswa.index') }}"
                       class="btn btn-light btn-lg me-2">
                        Lihat Data Mahasiswa
                    </a>

                    <a href="{{ route('mahasiswa.create') }}"
                       class="btn btn-outline-light btn-lg">
                        Tambah Mahasiswa
                    </a>
                </div>
            </div>

            <div class="col-md-4 text-center">
                <div class="hero-illustration">
                    <img src="https://cdn-icons-png.flaticon.com/512/3135/3135755.png"
                         class="img-fluid"
                         width="230"
                         alt="Mahasiswa">
                </div>
            </div>

        </div>

    </div>

    {{-- Statistik --}}
    <div class="row g-4">

        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100 stats-card">

                <div class="card-body text-center">
                    <div class="stats-icon text-primary">
                        <i class="bi bi-mortarboard-fill"></i>
                    </div>

                    <h4>Total Mahasiswa</h4>

                    <p class="text-muted">
                        Kelola seluruh data mahasiswa dengan mudah.
                    </p>
                </div>

            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100 stats-card">

                <div class="card-body text-center">
                    <div class="stats-icon text-success">
                        <i class="bi bi-journal-bookmark-fill"></i>
                    </div>

                    <h4>Program Studi</h4>

                    <p class="text-muted">
                        Mendukung berbagai program studi di Jurusan TI.
                    </p>
                </div>

            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100 stats-card">

                <div class="card-body text-center">
                    <div class="stats-icon text-danger">
                        <i class="bi bi-lightning-charge-fill"></i>
                    </div>

                    <h4>Laravel CRUD</h4>

                    <p class="text-muted">
                        Dibangun menggunakan Laravel dan Bootstrap 5.
                    </p>
                </div>

            </div>
        </div>

    </div>

    {{-- About --}}
    <div class="card border-0 shadow-sm mt-5">

        <div class="card-body p-4">

            <h3 class="mb-3">
                Tentang Sistem
            </h3>

            <p class="text-muted">
                Sistem ini digunakan untuk mengelola data mahasiswa seperti
                NIM, nama lengkap, tempat lahir, tanggal lahir,
                email, program studi, dan alamat mahasiswa.
            </p>

        </div>

    </div>

</div>

@endsection
