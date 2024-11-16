<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    // Menampilkan semua pengguna
    public function index(Request $request)
    {
        $search = $request->input('search');  // Ambil input pencarian

        $users = User::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%")
                         ->orWhere('email', 'like', "%{$search}%")
                         ->orWhere('role', 'like', "%{$search}%");
        })
        ->paginate(10);  // Menggunakan pagination dengan 10 data per halaman

        return view('user.users.index', compact('users'));
    }
    
    // Menampilkan form untuk tambah user
    public function create()
    {
        return view('user.users.create');  // Pastikan menggunakan folder yang sesuai
    }

    // Menyimpan user baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|string|in:user,admin',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $data = $request->only(['name', 'email', 'password', 'role']);
        $data['password'] = bcrypt($data['password']);
    
        if ($request->hasFile('profile_picture')) {
            // Menyimpan gambar di folder storage/public/profile_pictures
            $path = $request->file('profile_picture')->store('profile_pictures', 'public');
            $data['profile_picture'] = $path;
        }
    
        User::create($data);
    
        return redirect()->route('users.index')->with('success', 'Pengguna berhasil ditambahkan');
    }

    // Menampilkan detail user
    public function show(User $user)
    {
        return view('user.users.show', compact('user'));  // Menampilkan detail user
    }

    // Menampilkan form untuk edit user
    public function edit(User $user)
    {
        return view('user.users.edit', compact('user'));  // Pastikan menggunakan folder yang sesuai
    }

    // Mengupdate data user
    public function update(Request $request, User $user)
    {
        // Validasi data input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,  // Mengabaikan validasi untuk email yang sudah ada
            'password' => 'nullable|string|min:6|confirmed',  // Password opsional saat update
            'role' => 'required|in:user,admin',  // Validasi role hanya bisa user atau admin
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi gambar
        ]);

        // Mengupdate data user
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        
        // Cek jika password ada perubahan
        if ($request->password) {
            $user->password = Hash::make($validated['password']);  // Enkripsi password jika ada perubahan
        }
        
        // Cek jika ada gambar baru diupload
        if ($request->hasFile('profile_picture')) {
            // Hapus gambar lama jika ada
            if ($user->profile_picture && Storage::exists('public/' . $user->profile_picture)) {
                Storage::delete('public/' . $user->profile_picture);
            }

            // Simpan gambar baru
            $user->profile_picture = $request->file('profile_picture')->store('profile_pictures', 'public');
        }

        // Update role
        $user->role = $validated['role'];  
        $user->save();

        // Mengalihkan ke halaman daftar pengguna
        return redirect()->route('users.index')->with('success', 'User berhasil diperbarui!');
    }

    // Menghapus user
    public function destroy(User $user)
    {
        // Hapus foto profil jika ada
        if ($user->profile_picture && Storage::exists('public/' . $user->profile_picture)) {
            Storage::delete('public/' . $user->profile_picture);
        }

        $user->delete();  // Menghapus user
        return redirect()->route('users.index')->with('success', 'User berhasil dihapus!');
    }
}
