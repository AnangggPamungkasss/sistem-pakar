@extends('login.login')

@section('title','Sistem pakar cedera olahraga')

@section('content')
            @if ($errors->has('loginError'))
                <div class="alert alert-danger">
                    {{ $errors->first('loginError') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login.process') }}">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label text-start">Email</label>
                    <input type="email" id="email" name="email" class="form-control" placeholder="Masukkan email Anda" required>
                </div>
                <div class="mb-3 password-wrapper">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Masukkan password Anda" required>
                    <span class="toggle-password" onclick="togglePassword()">
                        <i class="bi bi-eye-slash" id="toggleIcon"></i>
                    </span>
                </div>

                <button type="submit" class="btn btn-costum-black">Login</button>

                <div class="mt-2">
                    <a href="{{ url('/') }}" class="btn btn-costum-black-link">Kembali ke beranda</a>
                </div>

                <div class="mb-3 text-center">
                    <a href="{{ route('register') }}" class="btn btn-link p-0 m-0 align-baseline">Daftar akun</a>
                </div>
            </form>
    @endsection
