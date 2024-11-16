<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil data pengguna untuk ditampilkan di dashboard (opsional)
        $users = User::all();  // Bisa tambahkan ini jika ingin menampilkan daftar pengguna di dashboard
        return view('user.dashboard', compact('users'));  // Arahkan ke halaman dashboard
    }
}
