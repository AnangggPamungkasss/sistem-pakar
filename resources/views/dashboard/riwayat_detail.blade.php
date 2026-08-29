@extends('dashboard.mainlayout')

@section('content')
<div class="card p-4">
    <h3>Detail Diagnosa</h3>
    <hr>
    @if(Auth::user()->role_id == 1)
        <p><strong>Pasien:</strong> {{ $riwayat->user->name }}</p>
    @endif
    <p><strong>Tanggal:</strong> {{ $riwayat->created_at->format('d-m-Y') }}</p>
    <p><strong>Cedera:</strong> {{ $riwayat->cedera->nama_cedera }}</p>
    <p><strong>Gejala:</strong> 
        @if(!empty($riwayat->gejala_nama))
            {{ implode(', ', $riwayat->gejala_nama) }}
        @else
            -
        @endif
    </p>
    <p><strong>Penanganan:</strong></p>
    @if(is_array($riwayat->cedera->penanganan))
        <ul>
            @foreach($riwayat->cedera->penanganan as $p)
                <li>{{ $p }}</li>
            @endforeach
        </ul>
    @else
        <p>{{ $riwayat->cedera->penanganan ?? '-' }}</p>
    @endif

    <a href="{{ route(Auth::user()->role_id == 1 ? 'admin.riwayat_diagnosa.index' : 'pasien.riwayat_diagnosa.index') }}" class="btn btn-secondary mt-3">Kembali</a>

</div>
@endsection
