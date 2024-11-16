<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validasi kredensial
        $credentials = $request->only('email', 'password');

        // Coba login menggunakan guard 'web' untuk semua pengguna (admin dan user)
        if (Auth::guard('web')->attempt($credentials)) {
            $user = Auth::guard('web')->user();
            return $this->authenticated($request, $user);
        }

        // Jika login gagal
        return redirect()->route('login')->with('error', 'Invalid credentials');
    }

    protected function authenticated(Request $request, $user)
    {
        // Jika user adalah admin, arahkan ke dashboard admin
        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        // Jika user adalah user biasa, arahkan ke dashboard user
        return redirect()->route('user.dashboard');
    }

    public function logout(Request $request)
    {
        Auth::logout();  // Logout user sesuai guard yang digunakan

        // Mengarahkan kembali ke halaman login setelah logout
        return redirect()->route('login');
    }
}
