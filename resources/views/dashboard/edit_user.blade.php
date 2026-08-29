@extends('dashboard.mainlayout')

@section('title', 'Edit User')

@section('content')
<div class="card tampil-data p-3">
    <div class="card-body">
        <h2 class="mb-3">Edit User</h2>

        <form action="{{ route('admin.user.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Nama</label>
                <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
            </div>

            <div class="mb-3">
                <label>Password (Kosongkan jika tidak diubah)</label>
                <input type="password" name="password" class="form-control">
                @error('password')
                <small class="text-danger">{{ $message }}</small>
            @enderror
            <small class="form-text text-muted">password minimal 6 karakter</small>
            </div>

            <div class="mb-3">
                <label>Role</label>
                <select name="role_id" class="form-control" required>
                    <option value="2" {{ $user->role_id == 2 ? 'selected' : '' }}>Pakar</option>
                    <option value="3" {{ $user->role_id == 3 ? 'selected' : '' }}>Pasien</option>
                </select>
            </div>

            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{ route('admin.user.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection
