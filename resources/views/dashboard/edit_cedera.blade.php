@extends('dashboard.mainlayout')

@section('title', 'Edit Cedera')

@section('content')

@php
    $rolePrefix = Auth::user()->role_id == 1 ? 'admin' : 'pakar';
@endphp

<div class="card tampil-data p-3">
    <div class="card-body">
        <h2 class="mb-3">Edit Cedera</h2>

        <form action="{{ route($rolePrefix.'.cedera.update', $cedera->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Nama Cedera</label>
                <input type="text" name="nama_cedera" class="form-control" value="{{ $cedera->nama_cedera }}" required>
            </div>

            <div class="mb-3">
                <label>Penanganan <small class="text-muted">(Pisahkan dengan tanda titik “.”)</small></label>
                <textarea name="penanganan" class="form-control" rows="5">{{ $cedera->penanganan ? implode('. ', $cedera->penanganan) : '' }}</textarea>
            </div>

            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{ route($rolePrefix.'.cedera.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection
