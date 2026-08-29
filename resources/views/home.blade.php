<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SISTEM PAKAR @yield('title')</title>
    <link rel="icon" type="image/png" href="{{ asset('asset/images/logo.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('asset/css/home.css') }}">
</head>
<body>
    <nav class="navbar navbar-dark navbar-expand-lg bg-black">
        <div class="container-fluid">
            <span class="navbar-brand">Sistem Pakar Cedera Olahraga</span>
            <a href="/login" class="text-white text-decoration-none">Login</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
                    data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    {{-- Hero Section --}}
    <section id="home" class="vh-100 d-flex align-items-center justify-content-center text-white text-center hero-section">
        <div>
            <h1 class="display-4 fw-bold">Sistem Pakar Cedera Olahraga</h1>
            <p class="lead mt-3">Kenali gejala cedera olahraga secara cepat, praktis, dan akurat.</p>
            <a href="#diagnosa-section" class="btn btn-warning btn-lg mt-4 px-5 py-2 rounded-pill shadow">
                Mulai Diagnosa
            </a>
        </div>
    </section>

    {{-- Section Fitur --}}
    <section id="fitur" class="py-5 bg-light section-separator">
        <div class="container text-center">
            <h2 class="fw-bold mb-4">Kenapa Menggunakan Sistem Ini?</h2>
            <div class="row g-4">
                <div class="col-md-3">
                    <div class="card h-100 border-0 shadow-sm p-3">
                        <i class="bi bi-lightning-charge text-warning display-4 mb-3"></i>
                        <h5 class="fw-bold">Cepat & Praktis</h5>
                        <p class="text-muted">Diagnosa awal hanya dengan menjawab beberapa pertanyaan singkat.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card h-100 border-0 shadow-sm p-3">
                        <i class="bi bi-gear text-primary display-4 mb-3"></i>
                        <h5 class="fw-bold">Berbasis Pengetahuan</h5>
                        <p class="text-muted">Menggunakan data yang telah dihimpun dari sumber sumber terpercaya</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card h-100 border-0 shadow-sm p-3">
                        <i class="bi bi-heart-pulse text-danger display-4 mb-3"></i>
                        <h5 class="fw-bold">Saran Penanganan</h5>
                        <p class="text-muted">Menyediakan rekomendasi awal sebelum konsultasi lebih lanjut ke dokter.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card h-100 border-0 shadow-sm p-3">
                        <i class="bi bi-globe2 text-success display-4 mb-3"></i>
                        <h5 class="fw-bold">Akses Mudah</h5>
                        <p class="text-muted">dapat digunakan kapan dan dimana saja melalui perangkat Anda.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Section Alur --}}
    <section id="alur" class="py-5 section-separator">
        <div class="container text-center">
            <h2 class="fw-bold mb-4">Cara kerja</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="p-4 border rounded-4 shadow-sm h-100">
                        <i class="bi bi-list-check text-primary display-5 mb-3"></i>
                        <h5 class="fw-bold">1. Pilih Gejala</h5>
                        <p class="text-muted">Pilih gejala yang sesuai dengan kondisi Anda saat ini.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-4 border rounded-4 shadow-sm h-100">
                        <i class="bi bi-cpu text-warning display-5 mb-3"></i>
                        <h5 class="fw-bold">2. Sistem Menganalisa</h5>
                        <p class="text-muted">Sistem pakar akan memproses jawaban Anda dengan metode inferensi.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-4 border rounded-4 shadow-sm h-100">
                        <i class="bi bi-clipboard2-pulse text-danger display-5 mb-3"></i>
                        <h5 class="fw-bold">3. Lihat Hasil</h5>
                        <p class="text-muted">Dapatkan hasil diagnosa dan rekomendasi penanganan awal.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Section Diagnosa --}}
    <section id="diagnosa-section" class="d-flex align-items-center justify-content-center bg-light section-separator min-vh-100">
        <div class="container">
            <h2 class="fw-bold text-center mb-4">Mulai Diagnosa Cedera Olahraga Anda</h2>
            <div class="card shadow-lg p-4 diagnosa-card">
                <div class="btn-container">
                @include('diagnosa.mulai_diagnosa')
                @include('diagnosa.penalaran')
                @include('diagnosa.forward')
                @include('diagnosa.backward')
                @include('diagnosa.hasil')
            </div>
            </div>
        </div>
    </section>

    <script>
        window.LaravelData = @json([
            'gejala' => $gejalaJs,
            'rules' => $rulesJs,
            'cedera' => $cederaJs
        ], JSON_UNESCAPED_UNICODE);
    </script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
crossorigin="anonymous"></script>

    <script src="{{ asset('asset/js/diagnosa.js')}}"></script>

        <!-- Footer -->
        <footer class="bg-dark text-white text-center py-3 mt-5">
            <div class="container">
                <small>© 2025 Sistem Pakar Cedera Olahraga || oleh Anang Pamungkas</small>
            </div>
        </footer>
    
</body>
</html>
