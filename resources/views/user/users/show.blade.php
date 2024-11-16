@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center text-primary mb-4">Detail Pengguna</h1>

        <!-- Kartu Pengguna -->
        <div class="card shadow-lg border-0 rounded-3">
            <div class="card-header bg-primary text-white text-center py-4">
                <h3 class="mb-0">Informasi Pengguna</h3>
            </div>
            <div class="card-body d-flex flex-column flex-md-row justify-content-center align-items-center">

                <!-- Gambar Profil -->
                <div class="d-flex flex-column align-items-center mb-4 mb-md-0 mx-3">
                    <img src="{{ $user->profile_picture ? asset('storage/' . $user->profile_picture) : 'https://via.placeholder.com/150' }}" 
                         class="rounded-circle mb-3 shadow-lg" 
                         alt="User Image" 
                         style="width: 150px; height: 150px;">
                    <h4 class="fw-bold text-dark">{{ $user->name }}</h4>
                    <p class="text-muted">{{ ucfirst($user->role) }}</p>
                </div>

                <!-- Detail Pengguna -->
                <div class="w-100 w-md-50 px-4">
                    <div class="mb-4">
                        <h5 class="fw-bold text-primary">Email</h5>
                        <p class="text-muted">{{ $user->email }}</p>
                    </div>

                    <!-- Menampilkan Tanggal Dibuat dan Diperbarui -->
                    <div class="mb-4">
                        <h5 class="fw-bold text-primary">Di Daftarkan Pada</h5>
                        <p class="text-muted">{{ $user->created_at->format('d F Y') }}</p>
                    </div>

                    @if($user->updated_at)
                        <div class="mb-4">
                            <h5 class="fw-bold text-primary">Terakhir Diperbarui Pada</h5>
                            <p class="text-muted">{{ $user->updated_at->format('d F Y') }}</p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Tombol Kembali -->
            <div class="card-footer text-center py-3">
                <a href="{{ route('users.index') }}" class="btn btn-secondary btn-lg px-5 py-2 rounded-3">Kembali ke Daftar Pengguna</a>
            </div>
        </div>
    </div>
@endsection
