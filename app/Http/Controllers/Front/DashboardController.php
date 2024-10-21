<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $title = "Halaman Dashboard";
        $subtitle = "Menu Dashboard";
        return view('back.dashboard', compact('title', 'subtitle'));
    }

    public function create()
    {
        // Menampilkan form untuk membuat user baru
        return view('users.create');
    }

    public function store(Request $request)
    {
        // Validasi data input
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        // Simpan user baru ke database
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password), // Hashing password
        ]);

        return redirect()->route('users.index')->with('success', 'User berhasil ditambahkan.');
    }

    public function edit($id)
    {
        // Menampilkan form edit untuk user
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data input
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
        ]);

        // Update data user di database
        $user = User::findOrFail($id);
        $user->update($request->only('name', 'email'));

        return redirect()->route('users.index')->with('success', 'User berhasil diupdate.');
    }

    public function destroy($id)
    {
        // Hapus user
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User berhasil dihapus.');
    }
}
