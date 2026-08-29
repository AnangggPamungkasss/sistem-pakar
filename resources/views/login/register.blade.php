@extends('login.login')

@section('title','Daftar Akun - Sistem Pakar Cedera Olahraga')

@section('content')
    <h3 class="mb-4 text-center">Daftar Akun Baru</h3>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('register.process') }}">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" id="name" name="name" class="form-control" placeholder="Masukkan nama lengkap Anda" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" name="email" class="form-control" placeholder="Masukkan email Anda" required>
        </div>

        <div class="mb-3 password-wrapper">
            <label for="password" class="form-label">Password</label>
            <div class="position-relative">
            <input type="password" name="password" class="form-control pe-5" placeholder="Masukkan password" required>
            <span class="toggle-password" >
                <i class="bi bi-eye-slash"></i>
            </span>
            </div>

            @error('password')
            <small class="text-danger">{{ $message }}</small>
        @enderror
        <small class="form-text text-muted">Password minimal 6 karakter</small>
        </div>

        <div class="mb-3 password-wrapper">
            <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
            <div class="position-relative">
            <input type="password" name="password_confirmation" class="form-control pe-5" placeholder="Ulangi password" required>
            <span class="toggle-password">
                <i class="bi bi-eye-slash"></i>
            </span>
        </div>
        </div>

        <button type="submit" class="btn btn-costum-black">Daftar</button>

        <div class="mt-3 text-center">
            <a href="{{ route('login') }}" class="btn btn-link p-0 m-0 align-baseline">Sudah punya akun? Login di sini</a>
        </div>
    </form>
@endsection
