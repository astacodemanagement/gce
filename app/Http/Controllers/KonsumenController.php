<?php

namespace App\Http\Controllers;

use App\Models\Konsumen;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;

class KonsumenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Ambil konsumen yang terhubung dengan user yang memiliki status 'Aktif'
        $konsumen = Konsumen::when(!$this->isSuperadmin(), function ($q) {
            return $q->where('cabang_id', Auth::user()->cabang_id);
        })
            ->whereHas('user', function ($query) {
                $query->where('status', 'Aktif'); // Filter berdasarkan status user
            })
            ->get();

        return view('konsumen.index', compact('konsumen'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('konsumen.create');
    }

    public function show($id)
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    // Metode untuk menyimpan data konsumen
    public function store(Request $request)
    {
        $request->merge(['no_telp' => str_replace(['+', ' '], '', $request->no_telp)]);

        $validatorRules = [
            'name' => 'required', // Validasi untuk nama
            'email' => 'required|email|unique:users,email', // Validasi untuk tabel users
            'status_cad' => 'required',
            'no_telp' => [
                'required',
                'numeric',
                Rule::unique('konsumen')->where(function ($query) use ($request) {
                    $query->where('cabang_id', $this->isSuperadmin() ? $request->cabang_id : Auth::user()->cabang_id);
                }),
            ],
            'alamat' => 'required',
        ];

        if ($this->isSuperadmin()) {
            $validatorRules['cabang_id'] = 'required';
        }

        $validator = Validator::make($request->all(), $validatorRules, [
            'no_telp.unique' => 'Nomor telepon sudah terdaftar.',
            'email.unique' => 'Email sudah digunakan.',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();

            if ($errors->has('no_telp')) {
                $existingKonsumen = Konsumen::where('no_telp', $request->no_telp)->first();

                if ($existingKonsumen) {
                    $errors->add('no_telp', 'Nomor telepon sudah terdaftar untuk user dengan ID ' . $existingKonsumen->user_id);
                }
            }

            return response()->json(['errors' => $errors], 422);
        }

        // Gunakan transaksi database
        DB::beginTransaction();

        try {
            // Simpan data ke tabel users
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->status = 'Aktif';
            $user->cabang_id = $this->isSuperadmin() ? $request->cabang_id : Auth::user()->cabang_id;
            $user->password = Hash::make($request->password); // Menggunakan password yang dienkripsi
            $user->save();

            // Assign role ke pengguna
            $role = Role::find(6); // Cari role dengan ID 6
            if ($role) {
                $user->assignRole($role->name); // Assign role ke user
            } else {
                return response(['success' => false, 'message' => 'Role tidak ditemukan'], 404);
            }

            // Simpan data ke tabel konsumen
            $konsumen = new Konsumen();
            $konsumen->user_id = $user->id; // Simpan ID user untuk relasi
            $konsumen->cabang_id = $this->isSuperadmin() ? $request->cabang_id : Auth::user()->cabang_id;
            $konsumen->no_telp = $request->no_telp;
            $konsumen->alamat = $request->alamat;
            $konsumen->status_cad = $request->status_cad;
            $konsumen->no_kontrak = $request->no_kontrak;
            $konsumen->jatuh_tempo = $request->jatuh_tempo;
            $konsumen->save();

            // Commit transaksi
            DB::commit();

            return response()->json(['message' => 'Data konsumen dan user berhasil disimpan']);
        } catch (\Exception $e) {
            // Rollback jika terjadi kesalahan
            DB::rollBack();

            return response()->json(['error' => 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage()], 500);
        }
    }






    public function edit($id)
    {
        $konsumen = Konsumen::when(!$this->isSuperadmin(), function ($q) {
            return $q->where('cabang_id', Auth::user()->cabang_id);
        })
            ->with('user') // Memuat relasi dengan user
            ->where('id', $id)
            ->first();

        if (!$konsumen) {
            return response(['success' => false, 'message' => 'Konsumen tidak ditemukan'], 404);
        }

        $konsumen->nama_cabang = $konsumen->cabang?->nama_cabang;
        return response()->json($konsumen);
    }



    public function update(Request $request, $id)
    {
        // Ambil data konsumen yang akan diperbarui
        $konsumen = Konsumen::when(!$this->isSuperadmin(), function ($q) {
            return $q->where('cabang_id', Auth::user()->cabang_id);
        })
            ->where('id', $id)
            ->first();

        if (!$konsumen) {
            return response(['success' => false, 'message' => 'Konsumen tidak ditemukan'], 404);
        }

        // Validasi request
        $request->merge(['no_telp' => str_replace(['+', ' '], '', $request->no_telp)]);
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'nullable|min:8|confirmed', // Password minimal 8 karakter, nullable, harus sama dengan password_confirmation
            'name' => 'required',
            'no_telp' => 'required|numeric',
            'alamat' => 'required',
            'status_cad' => 'required',
            'cabang_id' => $this->isSuperadmin() ? 'required' : 'nullable'
        ]);

        // Update data user
        $user = $konsumen->user;
        if ($user) {
            $user->name = $request->name;
            $user->email = $request->email;

            // Jika password diisi, lakukan hash dan update
            if ($request->filled('password')) {
                $user->password = Hash::make($request->password); // Menggunakan Hash::make
            }

            $user->save();
        }

        // Update data konsumen
        $konsumen->nama_perusahaan = $request->nama_perusahaan;
        $konsumen->no_telp = $request->no_telp;
        $konsumen->alamat = $request->alamat;
        $konsumen->status_cad = $request->status_cad;
        $konsumen->no_kontrak = $request->no_kontrak;
        $konsumen->jatuh_tempo = $request->jatuh_tempo;
        $konsumen->cabang_id = $this->isSuperadmin() ? $request->cabang_id : Auth::user()->cabang_id;
        $konsumen->save();

        return response()->json(['message' => 'Data konsumen dan user berhasil diperbarui']);
    }


    public function destroy($id)
    {
        // Ambil data konsumen berdasarkan ID dan cabang (jika bukan superadmin)
        $konsumen = Konsumen::when(!$this->isSuperadmin(), function ($q) {
            return $q->where('cabang_id', Auth::user()->cabang_id);
        })
            ->where('id', $id)
            ->first();

        if (!$konsumen) {
            return response()->json(['message' => 'Data konsumen tidak ditemukan'], 404);
        }

        // Check relasi dengan tabel transaksi
        $relasiTransaksi = Transaksi::where('konsumen_id', $id)->exists();
        if ($relasiTransaksi) {
            return response()->json(['message' => 'Data konsumen tidak bisa dihapus karena masih berelasi dengan transaksi'], 422);
        }

        // Ambil user terkait konsumen
        $user = User::find($konsumen->user_id);

        // Hapus peran pengguna jika ada
        if ($user) {
            // Hapus semua peran yang terkait dengan pengguna
            $user->roles()->detach(); // Detach semua peran dari pengguna

            // Hapus data pengguna di tabel users
            $user->delete();
        }

        // Hapus data konsumen
        $konsumen->delete();

        return response()->json(['message' => 'Data konsumen beserta pengguna berhasil dihapus']);
    }
}
