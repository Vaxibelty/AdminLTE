<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AdminController;
use App\Http\Controllers\Auth\UserController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\ProdukController;

// Rute CRUD Produk



// Rute untuk login dan pendaftaran default Laravel
Auth::routes();

// Rute utama (homepage)
Route::get('/', function () {
    return view('welcome');
});

// Rute untuk home setelah login (seharusnya diarahkan ke dashboard)
Route::get('/home', function () {
    return redirect()->route('user.dashboard');  // Arahkan langsung ke dashboard setelah login
})->name('home');

// Rute untuk admin (menggunakan middleware untuk admin)
Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});

// Rute untuk dashboard user biasa (menggunakan middleware untuk user)
Route::middleware(['auth'])->group(function () {
    Route::get('/user/dashboard', [DashboardController::class, 'index'])->name('user.dashboard');

    // Rute CRUD untuk pengguna dalam dashboard
    Route::get('/users/dashboard/index', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/dashboard/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users/dashboard', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/dashboard/{user}', [UserController::class, 'show'])->name('users.show');
    Route::get('/users/dashboard/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/dashboard/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/dashboard/{user}', [UserController::class, 'destroy'])->name('users.destroy');
});

Route::resource('produks', ProdukController::class);
// Logout route
Route::post('logout', function () {
    Auth::logout();
    return redirect()->route('login');  // Mengarahkan ke login setelah logout
})->name('logout');
