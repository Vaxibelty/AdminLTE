<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Memastikan hanya user yang bisa mengakses
        $this->middleware('role:user'); // Middleware untuk memeriksa role user
    }

    public function index()
    {
        return view('dashboard.user');
    }
}
