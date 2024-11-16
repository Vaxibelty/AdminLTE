<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Memastikan hanya admin yang bisa mengakses
        $this->middleware('role:admin'); // Middleware untuk memeriksa role admin
    }

    public function index()
    {
        $users = User::all();
        return view('dashboard.admin', compact('users'));
    }
}
