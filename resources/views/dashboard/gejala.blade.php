@extends('dashboard.mainlayout')

@section('title', 'Data Gejala')

@section('content')
@php
    // Tentukan prefix route berdasarkan role
    $rolePrefix = '';
    if(Auth::user()->role_id == 1) {
        $rolePrefix = 'admin';
    } elseif(Auth::user()->role_id == 2) {
        $rolePrefix = 'pakar';
    }
@endphp

<div class="card tampil-data p-3">
    <div class="card-body">
        <h2 class="mb-3">Data Gejala</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="actions-container mb-3">
            <a href="{{ route($rolePrefix.'.gejala.create') }}" class="btn btn-primary">
                + Tambah Gejala
            </a>
        </div>

        <div class="table-responsive">
            <table class="table costum-table">
                <thead>
                    <tr>
                        <th>Kode Gejala</th>
                        <th>Nama Gejala</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($gejala as $index => $g)
                    <tr>
                        <td>{{ $g->kode_gejala }}</td>
                        <td>{{ $g->nama_gejala }}</td>
                        <td>
                            @if($g->gambar)
                                <img src="{{ asset('storage/'.$g->gambar) }}" 
                                     alt="Gambar {{ $g->nama_gejala }}" 
                                     style="width: 60px; height: auto; border-radius: 5px;">
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route($rolePrefix.'.gejala.edit', $g->id) }}" 
                                   class="btn btn-warning btn-sm" 
                                   style="white-space: nowrap;">Edit</a>
                                <form action="{{ route($rolePrefix.'.gejala.destroy', $g->id) }}" method="POST" onsubmit="return confirm('Yakin hapus gejala ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" style="white-space: nowrap;">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-3">
                {{ $gejala->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
</div>
@endsection
