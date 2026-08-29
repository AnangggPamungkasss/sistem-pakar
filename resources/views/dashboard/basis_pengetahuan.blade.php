@extends('dashboard.mainlayout')

@section('title', 'Data Basis Pengetahuan')

@section('content')
@php
    $rolePrefix = Auth::user()->role_id == 1 ? 'admin' : 'pakar';

    $bpRoute = fn($action, $id = null) => $id 
        ? route($rolePrefix.'.basis_pengetahuan.'.$action, $id)
        : route($rolePrefix.'.basis_pengetahuan.'.$action);
@endphp

<div class="container mt-4">
    <h2 class="mb-4">Data Basis Pengetahuan</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm tampil-data">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table custom-table bp">
                    <thead class="table-light">
                        <tr>
                            <th style="width:10%">Kode</th>
                            <th style="width:20%">Cedera</th>
                            <th style="width:50%">Aturan</th>
                            <th style="width:20%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($cedera as $c)
                        <tr>
                            <td data-label="Kode">{{ $c->kode_cedera }}</td>
                            <td data-label="Cedera">{{ $c->nama_cedera }}</td>
                            <td data-label="Basis Pengetahuan" class="wrap-text text-start">
                                @if($c->basisPengetahuan->count() > 0)
                                    @foreach($c->basisPengetahuan as $rule)
                                        {{ $rule->gejala->nama_gejala }}@if(!$loop->last), @endif
                                    @endforeach
                                @else
                                    <span class="text-muted">Belum ada aturan</span>
                                @endif
                            </td>
                            
                            <td data-label="Aksi">
                                <a href="{{ $bpRoute('kelola', $c->id) }}" 
                                   class="btn btn-info btn-sm">
                                   Kelola
                                </a>
                            </td>                                   
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center">Belum ada data cedera</td>
                        </tr>
                        @endforelse
                    </tbody>                    
                </table>
                <div class="mt-3">
                    {{ $cedera->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
