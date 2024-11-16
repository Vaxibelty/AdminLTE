<?php
namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $products = Produk::paginate(10); // Menampilkan 10 produk per halaman
        return view('user.produk.index', compact('products'));
    }
    

    public function create()
    {
        return view('user.produk.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_barcode' => 'required|unique:produks', // Tabel 'produks'
            'nm_produk' => 'required',
            'stok' => 'required|integer',
            'deskripsi' => 'nullable',
        ]);

        Produk::create($request->all());

        return redirect()->route('produks.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function show(Produk $produk)
    {
        return view('user.produk.show', compact('produk'));
    }

    public function edit(Produk $produk)
    {
        return view('user.produk.edit', compact('produk'));
    }

    public function update(Request $request, Produk $produk)
    {
        $request->validate([
            'no_barcode' => 'required|unique:produks,no_barcode,' . $produk->id, // Tabel 'produks'
            'nm_produk' => 'required',
            'stok' => 'required|integer',
            'deskripsi' => 'nullable',
        ]);

        $produk->update($request->all());

        return redirect()->route('produks.index')->with('success', 'Produk berhasil diubah.');
    }

    public function destroy(Produk $produk)
    {
        $produk->delete();

        return redirect()->route('produks.index')->with('success', 'Produk berhasil dihapus.');
    }
}
