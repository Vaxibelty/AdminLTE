@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-left text-black fw-bold mb-4">Edit Produk</h1>

    <form action="{{ route('produks.update', $produk->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Input No Barcode -->
        <div class="mb-3">
            <label for="no_barcode" class="form-label">No Barcode</label>
            <input type="text" name="no_barcode" class="form-control @error('no_barcode') is-invalid @enderror" id="no_barcode" value="{{ old('no_barcode', $produk->no_barcode) }}" required>
            @error('no_barcode')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Input Nama Produk -->
        <div class="mb-3">
            <label for="nm_produk" class="form-label">Nama Produk</label>
            <input type="text" name="nm_produk" class="form-control @error('nm_produk') is-invalid @enderror" id="nm_produk" value="{{ old('nm_produk', $produk->nm_produk) }}" required>
            @error('nm_produk')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Input Stok -->
        <div class="mb-3">
            <label for="stok" class="form-label">Stok</label>
            <input type="number" name="stok" class="form-control @error('stok') is-invalid @enderror" id="stok" value="{{ old('stok', $produk->stok) }}" required>
            @error('stok')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Input Deskripsi -->
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi">{{ old('deskripsi', $produk->deskripsi) }}</textarea>
            @error('deskripsi')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Tombol Update -->
        <button type="submit" class="btn btn-primary btn-lg mt-4">Update</button>
        <a href="{{ route('produks.index') }}" class="btn btn-secondary btn-lg mt-4">Kembali</a>
    </form>
</div>
@endsection
