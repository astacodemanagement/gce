<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

 
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
 

class LoginController extends Controller
{
    public function login_pengguna()
    {
        $title = "Halaman Login";
        $subtitle = "Menu Login";



        return view('front.login.index', compact('title', 'subtitle'));
    }


    public function proses_login_pengguna(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        // Ambil pengguna berdasarkan email
        $user = User::where('email', $request->email)->first();
    
        // Cek apakah pengguna ditemukan dan password benar
        if ($user && Hash::check($request->password, $user->password)) {
            // Debug: Cek apakah pengguna berhasil login dan role-nya
            Log::info('User attempting to login:', ['email' => $user->email, 'role' => $user->role]);
    
            // Autentikasi pengguna
            Auth::login($user);
    
            // Cek apakah role pengguna sesuai
            if ($user->hasRole('pengguna')) {
                return redirect()->route('area.index'); // Arahkan ke halaman area jika login berhasil
            }
    
            // Logout jika role tidak sesuai
            Auth::logout();
            Log::warning('User logged out due to role mismatch:', ['email' => $user->email, 'role' => $user->role]);
            return redirect()->route('login_pengguna')->withErrors('Akses hanya untuk pengguna.');
        }
    
        // Jika gagal login, kembalikan dengan pesan error
        return back()->withErrors('Email atau password salah.');
    }
}
