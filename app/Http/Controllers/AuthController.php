<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Import Auth untuk autentikasi
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    // Menampilkan form login
    public function showLoginForm()
    {
        if (Auth::check()) {
            return redirect()->route('welcome');  // Jika sudah login, langsung ke halaman welcome
        }
        return view('auth.login');
    }

    // Menampilkan form register
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // Proses login
    public function login(Request $request)
{
    // Validasi input
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    // Mengecek apakah email mengandung kata 'admin', kecuali 'admin1719@gmail.com'
    if (stripos($request->email, 'admin') !== false && $request->email !== 'admin1719@gmail.com') {
        // Jika email mengandung kata admin dan bukan admin1719@gmail.com, beri pesan error
        return back()->withErrors([
            'email' => 'Email yang mengandung kata "admin" tidak diperbolehkan, kecuali "admin1719@gmail.com".',
        ]);
    }

    // Cek kredensial dengan Auth::attempt()
    if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
        // Jika login berhasil, arahkan ke halaman welcome
        return redirect()->route('welcome');
    }

    // Jika login gagal, kembali ke halaman login dengan pesan error
    return back()->withErrors([
        'email' => 'Email atau password salah.',
    ]);
}




    // Proses register
    public function register(Request $request)
{
    // Validasi input
    $validated = $request->validate([
        'email' => 'required|email|unique:users,email',  // Pastikan email unik
        'password' => 'required|min:8|confirmed',        // Pastikan password sesuai
    ]);

    // Mengecek apakah email mengandung kata 'admin', kecuali 'admin1719@gmail.com'
    if (stripos($validated['email'], 'admin') !== false && $validated['email'] !== 'admin1719@gmail.com') {
        // Jika email mengandung kata admin dan bukan admin1719@gmail.com, beri pesan error
        return back()->withErrors([
            'email' => 'Email yang mengandung kata "admin" tidak diperbolehkan, kecuali "admin1719@gmail.com".',
        ]);
    }

    // Hash password
    $hashedPassword = Hash::make($validated['password']);

    // Simpan data pengguna baru ke database
    DB::table('users')->insert([
        'email' => $validated['email'],
        'password' => $hashedPassword,
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    // Setelah registrasi berhasil, arahkan ke halaman login
    return redirect()->route('login')->with('status', 'Registrasi berhasil! Silakan login.');
}




    // Logout
    public function logout()
    {
        // Logout pengguna menggunakan Auth
        Auth::logout();

        // Arahkan kembali ke halaman login
        return redirect()->route('login');
    }
}
