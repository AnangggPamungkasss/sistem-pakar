@extends('dashboard.mainlayout')

@section('title', 'Tambah Cedera')

@section('content')

@php
    $rolePrefix = Auth::user()->role_id == 1 ? 'admin' : 'pakar';
@endphp

<div class="card tampil-data p-3">
    <div class="card-body">
        <h2>Tambah Cedera</h2>

        <form action="{{ route($rolePrefix.'.cedera.store') }}" method="POST">
            @csrf

            <div class="mb-2">
                <label for="nama_cedera" class="form-label">Nama Cedera</label>
                <input type="text" name="nama_cedera" id="nama_cedera" class="form-control" required>
            </div>

            <div class="mb-2">
                <label for="penanganan" class="form-label">
                    Penanganan <small class="text-muted">(Pisahkan dengan tanda titik “.”)</small>
                </label>
                <textarea name="penanganan" id="penanganan" class="form-control" rows="5">{{ old('penanganan') }}</textarea>
            </div>

            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route($rolePrefix.'.cedera.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection
