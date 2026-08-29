@extends('dashboard.mainlayout')

@section('title', 'Tambah Gejala')

@section('content')

@php
    $rolePrefix = '';
    if (Auth::user()->role_id == 1) {
        $rolePrefix = 'admin';
    } elseif (Auth::user()->role_id == 2) {
        $rolePrefix = 'pakar';
    }
@endphp

<div class="card tampil-data p-3">
    <div class="card-body">
        <h2>Tambah Gejala</h2>

        <form action="{{ route($rolePrefix.'.gejala.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-2">
                <label>Nama Gejala</label>
                <input type="text" name="nama_gejala" class="form-control" required>
            </div>

            <div class="mb-2">
                <label>Gambar (opsional)</label>
                <input type="file" name="gambar" class="form-control">

                <small class="text-muted">
                    Format : JPG, JPEG, PNG — Maksimal 2Mb/2000Kb
                </small>
            
                @error('gambar')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route($rolePrefix.'.gejala.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection
