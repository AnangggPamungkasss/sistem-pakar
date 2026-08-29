@extends('dashboard.mainlayout')

@section('title', 'Edit Gejala')

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
        <h2>Edit Gejala</h2>

        <form action="{{ route($rolePrefix.'.gejala.update', $gejala->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-2">
                <label>Kode Gejala</label>
                <input type="text" class="form-control" value="{{ $gejala->kode_gejala }}" disabled>
            </div>

            <div class="mb-2">
                <label>Nama Gejala</label>
                <input type="text" name="nama_gejala" class="form-control" value="{{ $gejala->nama_gejala }}" required>
            </div>

            <div class="mb-2">
                <label>Gambar</label>
                <input type="file" name="gambar" class="form-control">

                <small class="text-muted">
                    Format : JPG, JPEG, PNG — Maksimal 2Mb/2000Kb
                </small>
            
                @error('gambar')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
        
                @if($gejala->gambar)
                    <div class="mt-2">
                        <img src="{{ asset('storage/'.$gejala->gambar) }}" 
                             alt="Gambar {{ $gejala->nama_gejala }}" 
                             style="width: 80px; height: auto; border-radius: 5px;">
                    </div>
                @endif
            </div>
        

            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route($rolePrefix.'.gejala.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection
