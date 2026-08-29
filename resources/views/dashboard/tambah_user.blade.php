@extends('dashboard.mainlayout')

@section('title', 'Tambah User')

@section('content')
<div class="card tampil-data p-3">
    <div class="card-body">
        <h2 class="mb-3">Tambah User</h2>

        <form action="{{ route('admin.user.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label>Nama</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>

                @error('password')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
                <small class="form-text text-muted">Password minimal 6 karakter</small>
            </div>

            <div class="mb-3">
                <label>Role</label>
                <select name="role_id" class="form-control" required>
                    <option value="2">Pakar</option>
                    <option value="3">Pasien</option>
                </select>
            </div>

            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('admin.user.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection
