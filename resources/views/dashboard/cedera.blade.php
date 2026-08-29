@extends('dashboard.mainlayout')

@section('title', 'Data Cedera')

@section('content')
@php 
    $rolePrefix = Auth::user()->role_id == 1 ? 'admin' : 'pakar';
@endphp
<div class="card tampil-data p-3">
    <div class="card-body">
        <h2 class="mb-3">Data Cedera</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="actions-container mb-3">
            <a href="{{ route($rolePrefix.'.cedera.create') }}" class="btn btn-primary">
                + Tambah Cedera
            </a>
        </div>

        <div class="table-responsive">
            <table class="table costum-table">
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Nama Cedera</th>
                        <th>Penanganan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cedera as $c)
                    <tr>
                        <td>{{ $c->kode_cedera }}</td>
                        <td>{{ $c->nama_cedera }}</td>
                        <td class="wrap-text">
                            @if(!empty($c->penanganan) && is_array($c->penanganan))
                                <ul>
                                    @foreach($c->penanganan as $p)
                                        <li>{{ $p }}</li>
                                    @endforeach
                                </ul>
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route($rolePrefix.'.cedera.edit', $c->id) }}" class="btn btn-warning btn-sm" style="white-space: nowrap;">Edit</a>
                                <form action="{{ route($rolePrefix.'.cedera.destroy', $c->id) }}" method="POST" onsubmit="return confirm('Yakin hapus cedera ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" style="white-space: nowrap;">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-3">
                {{ $cedera->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
</div>
@endsection
