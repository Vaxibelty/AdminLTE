@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-4">Edit Pengguna</h1>

        <!-- Form Edit Pengguna -->
        <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Nama -->
            <div class="mb-3">
                <label for="name" class="form-label">Nama:</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $user->name) }}" required>
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Password (Opsional) -->
            <div class="mb-3">
                <label for="password" class="form-label">Password (opsional):</label>
                <input type="password" name="password" id="password" class="form-control">
                @error('password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Konfirmasi Password (opsional):</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
            </div>

            <!-- Role -->
            <div class="mb-3">
                <label for="role" class="form-label">Role:</label>
                <select name="role" id="role" class="form-select" required>
                    <option value="user" {{ old('role', $user->role) == 'user' ? 'selected' : '' }}>User</option>
                    <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                </select>
                @error('role')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Foto Profil Lama -->
            <div class="mb-3">
                <label for="current_profile_picture" class="form-label">Foto Profil Saat Ini:</label><br>
                <img src="{{ $user->profile_picture ? asset('storage/' . $user->profile_picture) : 'https://via.placeholder.com/150' }}" alt="Foto Profil" style="width: 100px; height: 100px; object-fit: cover;">
            </div>

            <!-- Input Ganti Foto Profil -->
            <div class="mb-3">
                <label for="profile_picture" class="form-label">Ganti Foto Profil:</label>
                <input type="file" name="profile_picture" id="profile_picture" class="form-control" accept="image/*">
                @error('profile_picture')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Button Update Pengguna -->
            <button type="submit" class="btn btn-primary btn-lg mt-4">Update Pengguna</button>
            
            <!-- Button Kembali -->
            <a href="{{ route('users.index') }}" class="btn btn-secondary btn-lg mt-4 ms-2">Kembali</a>
        </form>
    </div>
@endsection
