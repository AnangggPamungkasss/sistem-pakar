<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>SISTEM PAKAR @yield('title')</title>
    <link rel="icon" type="image/png" href="{{ asset('asset/images/logo.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('asset/css/dashboard.css') }}">
</head>

<body>
    <div class="main">
    <nav class="navbar navbar-dark navbar-expand-lg bg-black">
    <div class="container-fluid">
        <span class="navbar-brand">Sistem Pakar Cedera Olahraga</span>

        <div class="d-flex align-items-center ms-auto gap-3">
            @if(Auth::check() && Auth::user()->role_id == 1)
                <div class="dropdown">
                    <a class="nav-link text-white position-relative" data-bs-toggle="dropdown" href="#">
                        <i class="bi bi-bell fs-5"></i>
                        @if(isset($belumDibaca) && $belumDibaca > 0)
                            <span class="badge bg-danger position-absolute top-0 start-100 translate-middle p-1">
                                {{ $belumDibaca }}
                            </span>
                        @endif
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end notifikasi-dropdown">
                        <li class="dropdown-header text-center fw-semibold text-secondary">🔔 Notifikasi</li>
                        <li><hr class="dropdown-divider my-1"></li>
        
                        @forelse($notifikasi as $notif)
                        <li id="notif-{{ $notif->id }}" class="notification-item notif-id-{{ $notif->id }} {{ $notif->dibaca ? 'dibaca' : 'belum-dibaca' }}">
                                <div class="notif-content d-flex justify-content-between align-items-start">
                                    <div class="notif-text flex-grow-1 me-2">
                                        <div class="notif-message">{{ $notif->pesan }}</div>
                                        <small class="notif-time">{{ $notif->created_at->diffForHumans() }}</small>
                                    </div>
                                    <button type="button" class="btn-dibaca" data-id="{{ $notif->id }}">✓</button>
                                </div>
                            </li>
                        @empty
                            <li class="p-3 text-center text-muted">Belum ada notifikasi</li>
                        @endforelse
                    </ul>
                </div>
            @endif
        
            @if(Auth::check())
                <div class="dropdown">
                    <a class="nav-link dropdown-toggle text-white d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-circle fs-5 me-1"></i>
                        {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li class="dropdown-item text-center fw-bold">{{ Auth::user()->name }}</li>
                        <li class="dropdown-item text-center text-muted">
                            @if(Auth::user()->role_id == 1)
                                admin
                            @elseif(Auth::user()->role_id == 2)
                                pakar
                            @elseif(Auth::user()->role_id == 3)
                                pasien
                            @endif
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <a href="#" class="text-danger"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="bi bi-box-arrow-right"></i> Keluar
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            @else
                <a href="/login" class="text-white text-decoration-none">Login</a>
            @endif
        </div>        

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
        data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>

<div class="body-content h-100">
    <div class="row g-0 h-100">
        <div class="sidebar col-lg-2 collapse d-lg-block" id="navbarContent">
            <button class="btn btn-dark w-100 mb-3" id="toggleSidebar">
                <i class="bi bi-list"></i>
            </button>            
            @if(Auth::check() && Auth::user()->role_id == 1)
            <a href="{{ route('admin.user.index') }}">
                <i class="bi bi-person-circle"></i></i><span>User</span></a>
            <a href="{{ route('admin.gejala.index') }}">
                <i class="bi bi-clipboard-pulse"></i><span>Gejala</span></a>
            <a href="{{ route('admin.cedera.index') }}">
                <i class="bi bi-bandaid"></i><span>Cedera</span></a>
             <a href="{{ route('admin.basis_pengetahuan.index') }}">
                <i class="bi bi-journals"></i><span>Basis Pengetahuan</span></a>
            <a href="{{ route('admin.riwayat_diagnosa.index') }}">
                <i class="bi bi-clock-history"></i><span>Riwayat Diagnosa</span></a>
                <hr>
            @endif

            @if(Auth::check() && Auth::user()->role_id == 2)
                    <a href="{{ route('pakar.gejala.index') }}">
                        <i class="bi bi-clipboard-pulse"></i><span>Gejala</span></a>
                    <a href="{{ route('pakar.cedera.index') }}">
                        <i class="bi bi-bandaid"></i><span>Cedera</span></a>
                    <a href="{{ route('pakar.basis_pengetahuan.index') }}">
                        <i class="bi bi-journals"></i><span>Basis Pengetahuan</span></a>
                    <hr>
                @endif

            @if(Auth::check() && Auth::user()->role_id == 3)
            <a href="{{ route('pasien.diagnosa_index') }}">
                <i class="bi bi-heart-pulse"></i><span>Diagnosa</span></a>
            <a href="{{ route('pasien.riwayat_diagnosa.index') }}">
                <i class="bi bi-clock-history"></i> <span>Riwayat Diagnosa</span></a>
            @endif

        </div>
            <div class="content p-5 col-10">
                @yield('content')
                @yield('script')
            </div>
        </div>
    </div>


    <script src="{{ asset('asset/js/dashboard.js') }}"></script>
    <script src="{{ asset('asset/js/notifikasi.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" 
    crossorigin="anonymous"></script>
    
</body>
</html>
