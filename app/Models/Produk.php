<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    // Tentukan nama tabel yang digunakan oleh model ini
    protected $table = 'produks';

    protected $fillable = [
        'no_barcode',
        'nm_produk',
        'stok',
        'deskripsi',
    ];
}
