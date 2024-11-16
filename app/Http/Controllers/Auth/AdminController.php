<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        // Pastikan admin sudah login
        if (auth()->user()->role !== 'admin') {
            return redirect('/'); // Atau bisa diarahkan ke halaman lain
        }

        return view('admin');
    }
}
