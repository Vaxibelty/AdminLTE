@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Produk</h1>
    <table class="table">
        <tr>
            <th>No Barcode:</th>
            <td>{{ $produk->no_barcode }}</td>
        </tr>
        <tr>
            <th>Nama Produk:</th>
            <td>{{ $produk->nm_produk }}</td>
        </tr>
        <tr>
            <th>Stok:</th>
            <td>{{ $produk->stok }}</td>
        </tr>
        <tr>
            <th>Deskripsi:</th>
            <td>{{ $produk->deskripsi }}</td>
        </tr>
    </table>
    <a href="{{ route('produks.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
