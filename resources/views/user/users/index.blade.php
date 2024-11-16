@extends('layouts.app')

@section('content')
    <style>
        .table th, .table td {
            text-align: center;
        }

        .card-header {
            background-color: #007bff;
            color: white;
            font-weight: bold;
        }

        .btn {
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .btn:hover {
            background-color: #0056b3;
            color: white;
        }

        /* Styling gambar profil */
        .profile-img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
            max-width: 100%;
            max-height: 100%;
        }

        /* Styling untuk tombol aksi */
        .btn-sm {
            padding: 6px 12px;
        }

        .btn-info, .btn-warning, .btn-danger {
            transition: transform 0.3s ease;
        }

        .btn-info:hover, .btn-warning:hover, .btn-danger:hover {
            transform: scale(1.05);
        }

        .input-group {
            margin-bottom: 20px;
        }

        .search-btn {
            margin-top: 0;
        }
    </style>

    <div class="container">
        <h1 class="my-4">Daftar Pengguna</h1>
        
        <!-- Tombol Kembali ke Dashboard -->
        <div class="d-flex justify-content-between mb-4">
            <a href="{{ route('user.dashboard') }}" class="btn btn-secondary btn-lg">
                <i class="nav-icon fas fa-arrow-left"></i> Kembali ke Dashboard
            </a>
            <a href="{{ route('users.create') }}" class="btn btn-primary btn-lg">
                <i class="nav-icon fas fa-plus"></i> Tambah Pengguna
            </a>
        </div>
        
        <!-- Form Pencarian Pengguna -->
        <form action="{{ route('users.index') }}" method="GET" class="mb-4">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Cari pengguna..." value="{{ request('search') }}">
                <button class="btn btn-outline-secondary search-btn" type="submit">Cari</button>
            </div>
        </form>

        <!-- Tabel Pengguna dengan Garis di Tabel -->
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Foto Profil</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <!-- Menampilkan Foto Profil -->
                        <td>
                            <img src="{{ $user->profile_picture ? asset('storage/' . $user->profile_picture) : 'https://via.placeholder.com/50' }}" 
                                 alt="Foto Profil" class="profile-img">
                        </td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td>
                            <!-- Tombol Aksi dengan Ikon dan Garis Bawah -->
                            <a href="{{ route('users.show', $user->id) }}" class="btn btn-info btn-sm" title="Lihat Detail" style="text-decoration: underline;">
                                <i class="nav-icon fas fa-user-alt"></i> Lihat
                            </a>
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm" title="Edit" style="text-decoration: underline;">
                                <i class="nav-icon fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" title="Hapus" style="text-decoration: underline;">
                                    <i class="nav-icon fas fa-trash"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination (jika ada) -->
        {{ $users->links() }}
    </div>
@endsection
