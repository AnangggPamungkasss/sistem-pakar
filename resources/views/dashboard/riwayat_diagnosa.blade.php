@extends('dashboard.mainlayout')

@section('content')
<div class="card p-3">
    <h3>Riwayat Diagnosa</h3>

    <table class="table table-bordered">
        <thead>
            <tr>
                @if(Auth::user()->role_id == 1)
                    <th>Pasien</th>
                @endif
                <th>Tanggal Diagnosa</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($riwayat as $r)
                <tr>
                    @if(Auth::user()->role_id == 1)
                        <td>{{ $r->user->name }}</td>
                    @endif
                    <td>{{ $r->created_at->format('d-m-Y') }}</td>
                    <td>
                        <!-- Detail -->
                        @if(Auth::user()->role_id == 1)
                            <a href="{{ route('admin.riwayat_diagnosa.show', $r->id) }}" class="btn btn-info btn-sm">Detail</a>
                        @elseif(Auth::user()->role_id == 3)
                            <a href="{{ route('pasien.riwayat_diagnosa.show', $r->id) }}" class="btn btn-info btn-sm">Detail</a>
                        @endif

                    
<form action="{{ route(Auth::user()->role_id == 1 ? 'admin.riwayat_diagnosa.destroy' : 'pasien.riwayat_diagnosa.destroy', $r->id) }}" 
    method="POST" 
    class="d-inline" 
    onsubmit="return confirm('Yakin ingin menghapus data ini?')">
  @csrf
  @method('DELETE')
  <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
</form>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
