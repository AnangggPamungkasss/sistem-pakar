@extends('dashboard.mainlayout') 

@section('title', 'Data User')

@section('content')
<div class="card tampil-data p-3">
    <div class="card-body">
        <h2 class="mb-3">Data User</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="actions-container mb-3">
            <a href="{{ route('admin.user.create') }}" class="btn btn-primary">
                + Tambah User
            </a>
        </div>

        <div class="table-responsive">
            <table class="table costum-table">
                <thead>
                    <tr>
                        <th>Nama (Username)</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $index => $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role }}</td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('admin.user.edit', $user->id) }}" 
                                       class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('admin.user.destroy', $user->id) }}" 
                                          method="POST" 
                                          onsubmit="return confirm('Yakin hapus user ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-3">
                {{ $users->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
</div>
@endsection
