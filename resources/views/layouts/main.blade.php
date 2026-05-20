
<!doctype html>
<html lang="en" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>@yield('title', 'Sistem Informasi Jurusan TI')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        :root {
            --brand-blue: #0d6efd;
            --brand-blue-dark: #0649b8;
            --brand-blue-deep: #08245f;
            --brand-blue-soft: #e8f2ff;
            --ink: #172033;
            --muted: #667085;
            --line: #e3ebf5;
            --panel: rgba(255, 255, 255, .92);
            --soft-shadow: 0 18px 46px rgba(16, 24, 40, .10);
        }

        body {
            color: var(--ink);
            font-family: "Segoe UI Variable", "Segoe UI", Tahoma, sans-serif;
            background:
                radial-gradient(circle at 10% -10%, rgba(13, 110, 253, .18), transparent 28rem),
                radial-gradient(circle at 90% 4%, rgba(0, 145, 255, .12), transparent 24rem),
                linear-gradient(180deg, #f5f9ff 0%, #ffffff 46%, #f8fbff 100%);
        }

        main > .container {
            max-width: 1180px;
            padding: 96px 15px 52px;
        }

        .navbar.bg-dark,
        .footer.bg-dark {
            background: linear-gradient(105deg, #071b3a 0%, #0b2f68 48%, #06172d 100%) !important;
            box-shadow: 0 14px 34px rgba(7, 27, 58, .20);
        }

        .navbar {
            border-bottom: 1px solid rgba(255, 255, 255, .08);
            backdrop-filter: blur(14px);
            min-height: 64px;
        }

        .navbar-brand {
            display: inline-flex;
            align-items: center;
            gap: .6rem;
            font-weight: 800;
            letter-spacing: .1px;
        }

        .brand-badge {
            display: inline-grid;
            width: 34px;
            height: 34px;
            place-items: center;
            border-radius: 12px;
            color: #fff;
            background: linear-gradient(135deg, #3aa0ff, #0d6efd);
            box-shadow: inset 0 1px 0 rgba(255, 255, 255, .35), 0 8px 18px rgba(13, 110, 253, .32);
        }

        .navbar-dark .navbar-nav .nav-link {
            border-radius: 999px;
            margin-inline: .08rem;
            padding: .48rem .9rem;
            font-weight: 600;
            transition: color .2s ease, background-color .2s ease;
        }

        .navbar-dark .navbar-nav .nav-link:hover,
        .navbar-dark .navbar-nav .nav-link.active {
            color: #fff;
            background: rgba(255, 255, 255, .14);
        }

        .navbar .form-control {
            min-width: 230px;
            border-color: rgba(255, 255, 255, .18);
            border-radius: 12px;
            background: rgba(255, 255, 255, .96);
        }

        .navbar .btn {
            border-radius: 12px;
        }

        .hero-section {
            position: relative;
            overflow: hidden;
            border: 0;
            background:
                linear-gradient(135deg, rgba(13, 110, 253, .98) 0%, rgba(7, 83, 196, .98) 48%, rgba(5, 41, 111, .98) 100%),
                repeating-linear-gradient(135deg, rgba(255,255,255,.12) 0 1px, transparent 1px 18px) !important;
            box-shadow: 0 26px 58px rgba(13, 110, 253, .26) !important;
        }

        .hero-section::after {
            position: absolute;
            right: -72px;
            bottom: -112px;
            width: 280px;
            height: 280px;
            border-radius: 50%;
            background: rgba(255, 255, 255, .12);
            content: "";
        }

        .hero-section::before {
            position: absolute;
            inset: 22px 22px auto auto;
            width: 150px;
            height: 150px;
            border: 1px solid rgba(255, 255, 255, .16);
            border-radius: 32px;
            transform: rotate(18deg);
            content: "";
        }

        .hero-section .row {
            position: relative;
            z-index: 1;
        }

        .hero-kicker {
            display: inline-flex;
            align-items: center;
            gap: .45rem;
            margin-bottom: 1rem;
            border: 1px solid rgba(255, 255, 255, .22);
            border-radius: 999px;
            padding: .42rem .75rem;
            color: rgba(255, 255, 255, .92);
            font-size: .9rem;
            font-weight: 700;
            background: rgba(255, 255, 255, .12);
        }

        .hero-section h1 {
            letter-spacing: -.02em;
            line-height: 1.08;
        }

        .hero-section .lead {
            max-width: 680px;
            color: rgba(255, 255, 255, .88);
        }

        .hero-illustration {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 34px;
            padding: 1.2rem;
            background: rgba(255, 255, 255, .12);
            box-shadow: inset 0 1px 0 rgba(255, 255, 255, .18);
        }

        .card {
            border-color: var(--line) !important;
            border-radius: 18px !important;
            background: var(--panel);
            box-shadow: var(--soft-shadow) !important;
            transition: transform .22s ease, box-shadow .22s ease, border-color .22s ease;
        }

        .card:hover {
            transform: translateY(-4px);
            border-color: rgba(13, 110, 253, .18) !important;
            box-shadow: 0 24px 54px rgba(16, 24, 40, .13) !important;
        }

        .card-header.bg-primary {
            border-bottom: 0;
            background: linear-gradient(135deg, #0d6efd, #0753c4) !important;
        }

        .card-body {
            padding: 1.45rem;
        }

        .stats-icon {
            display: inline-flex;
            width: 58px;
            height: 58px;
            align-items: center;
            justify-content: center;
            margin-bottom: .95rem;
            border-radius: 18px;
            font-size: 1.65rem;
            background: linear-gradient(145deg, #eef6ff, #d9ebff);
            box-shadow: inset 0 1px 0 rgba(255,255,255,.75);
        }

        .stats-card h4 {
            font-weight: 800;
            letter-spacing: -.01em;
        }

        .btn {
            border-radius: 12px;
            font-weight: 700;
            transition: transform .18s ease, box-shadow .18s ease, background-color .18s ease;
        }

        .btn:hover {
            transform: translateY(-2px);
        }

        .btn-primary,
        .btn-success {
            border-color: var(--brand-blue);
            background: linear-gradient(135deg, var(--brand-blue), #0b5ed7);
            box-shadow: 0 12px 24px rgba(13, 110, 253, .22);
        }

        .btn-primary:hover,
        .btn-success:hover {
            border-color: var(--brand-blue-dark);
            background: linear-gradient(135deg, #0b5ed7, var(--brand-blue-dark));
        }

        .btn-outline-light {
            border-color: rgba(255, 255, 255, .72);
        }

        .btn-warning,
        .btn-danger,
        .btn-secondary {
            box-shadow: 0 6px 16px rgba(16, 24, 40, .10);
        }

        .form-control,
        .form-select {
            border-color: #dce4ee;
            border-radius: 12px;
            padding: .68rem .85rem;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--brand-blue);
            box-shadow: 0 0 0 .2rem rgba(13, 110, 253, .14);
        }

        .table-responsive {
            border-radius: 16px;
            border: 1px solid var(--line);
        }

        .table {
            margin-bottom: 0;
        }

        .table thead th {
            border-bottom: 1px solid var(--line);
            color: #475467;
            font-size: .82rem;
            letter-spacing: .02em;
            text-transform: uppercase;
            background: #f3f7fc;
        }

        .table > :not(caption) > * > * {
            padding: .85rem .9rem;
            vertical-align: middle;
        }

        .table-hover > tbody > tr:hover > * {
            --bs-table-accent-bg: rgba(13, 110, 253, .055);
        }

        .pagination {
            gap: .3rem;
        }

        .page-link {
            border-radius: 10px !important;
            color: var(--brand-blue);
        }

        .alert {
            border: 0;
            border-radius: 14px;
        }

        .page-item.active .page-link {
            border-color: var(--brand-blue);
            background: var(--brand-blue);
        }

        @media (max-width: 767.98px) {
            main > .container {
                padding-top: 76px;
            }

            .hero-section {
                padding: 2rem !important;
                border-radius: 20px !important;
            }

            .hero-section .btn {
                width: 100%;
                margin: .3rem 0 !important;
            }

            .navbar .form-control {
                min-width: 0;
                margin-top: .75rem;
            }

            .d-flex.justify-content-between.align-items-center {
                gap: 1rem;
                align-items: flex-start !important;
                flex-direction: column;
            }
        }
    </style>

  </head>
    <body class="d-flex flex-column h-100">
        @include('layouts.header')    

        <!-- Begin page content -->
        <main class="flex-0">
        <div class="container">
            @yield('content')
        </div>
        </main>

        @include('layouts.footer')

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

        <script>
          @if (session('success'))
              Swal.fire({
                  icon: 'success',
                  title: 'Berhasil',
                  text: '{{ session('success') }}',
                  timer: 3000,
                  showConfirmButton: false
              })
          @endif
        </script>
        
    </body>
</html>
