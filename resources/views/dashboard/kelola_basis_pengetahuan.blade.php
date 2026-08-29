@extends('dashboard.mainlayout')

@section('title', 'Kelola Basis Pengetahuan')

@section('content')

@php
    $rolePrefix = Auth::user()->role_id == 1 ? 'admin' : 'pakar';
@endphp

<div class="container mt-4">
    <h2 class="mb-4">Kelola Basis Pengetahuan - {{ $cedera->nama_cedera }}</h2>

    <form method="POST" action="{{ route($rolePrefix.'.basis_pengetahuan.updateKelola', $cedera->id) }}">
        @csrf
        <div class="mb-3">
            <label><strong>Pilih Gejala:</strong></label>
            <div class="row">
                @foreach($gejala as $g)
                <div class="col-md-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" 
                               name="gejala_id[]" value="{{ $g->id }}"
                               @if(in_array($g->id, $selectedGejala)) checked @endif>
                        <label class="form-check-label">
                            {{ $g->kode_gejala }} - {{ $g->nama_gejala }}
                        </label>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route($rolePrefix.'.basis_pengetahuan.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection