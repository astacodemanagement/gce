<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

use App\Models\LogHistori;
use App\Models\Konsumen;
use App\Models\Profil;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Validation\Rule;

class PendaftaranController extends Controller
{
    public function index()
    {
        $title = "Halaman Pendaftaran";
        $subtitle = "Menu Pendaftaran";

        // Ambil konsumen dengan status 'Non Aktif'
        $konsumen = Konsumen::whereHas('user', function ($query) {
            $query->where('status', 'Non Aktif');
        })->get();

        return view('back.pendaftaran.index', compact('konsumen', 'title', 'subtitle'));
    }

    public function submit_pendaftaran(Request $request)
    {

        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'kategori_konsumen' => 'required|string',
            'nama_perusahaan' => 'nullable|string|max:255',
            'jenis_kelamin' => 'required|string|in:Pria,Wanita',
            'email' => 'required|email|unique:users,email|max:255',
            'password' => 'required|min:8|confirmed',
            'no_telp' => [
                'required',
                'string',
                'max:15',
                Rule::unique('konsumen', 'no_telp'),
                Rule::unique('users', 'no_telp'),
                function ($attribute, $value, $fail) {
                    if (\DB::table('blokir')->where('no_wa', $value)->exists()) {
                        $fail('Nomor telepon ini tidak diperbolehkan untuk didaftarkan.');
                    }
                },
            ],

            'alamat' => 'required|string|max:500',
            'tanggal_lahir' => 'required|date',
            'kode_referal' => 'nullable|string|max:10',
            // 'g-recaptcha-response' => 'required|recaptchav3:register,0.5'
        ], [
            'nama_lengkap.required' => 'Nama lengkap harus diisi.',
            'kategori_konsumen.required' => 'Kategori konsumen harus diisi.',
            'email.required' => 'Email harus diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah terdaftar.',
            'password.required' => 'Password harus diisi.',
            'password.min' => 'Password minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
            'no_telp.required' => 'Nomor telepon harus diisi.',
            'no_telp.unique' => 'Nomor telepon sudah terdaftar.',
            'alamat.required' => 'Alamat harus diisi.',
            'tanggal_lahir.required' => 'Tanggal lahir harus diisi.',
            // 'g-recaptcha-response.required' => 'Anda harus melewati reCAPTCHA.',
        ]);


        $sanitizedInput = [
            'nama_lengkap' => htmlspecialchars(strip_tags($request->nama_lengkap)),
            'kategori_konsumen' => htmlspecialchars(strip_tags($request->kategori_konsumen)),
            'nama_perusahaan' => htmlspecialchars(strip_tags($request->nama_perusahaan)),
            'jenis_kelamin' => htmlspecialchars(strip_tags($request->jenis_kelamin)),
            'email' => htmlspecialchars(strip_tags($request->email)),
            'no_telp' => htmlspecialchars(strip_tags($request->no_telp)),
            'alamat' => htmlspecialchars(strip_tags($request->alamat)),
            'tanggal_lahir' => $request->tanggal_lahir,
            'kode_referal' => htmlspecialchars(strip_tags($request->kode_referal)),
        ];

        $user = User::create([
            'email' => $sanitizedInput['email'],
            'status' => 'Non Aktif',
            'name' => $sanitizedInput['nama_lengkap'],
            'password' => Hash::make($request->password),
        ]);

        Konsumen::create([
            'user_id' => $user->id,
            'kategori_konsumen' => $sanitizedInput['kategori_konsumen'],
            'nama_perusahaan' => $sanitizedInput['kategori_konsumen'] === 'corporate' ? $sanitizedInput['nama_perusahaan'] : null,
            'jenis_kelamin' => $sanitizedInput['jenis_kelamin'],
            'tanggal_lahir' => $sanitizedInput['tanggal_lahir'],
            'no_telp' => $sanitizedInput['no_telp'],
            'alamat' => $sanitizedInput['alamat'],
            'kode_referal' => $sanitizedInput['kode_referal'],
            'jenis_konsumen' => 'FLP',
        ]);

        // Assign role ke pengguna
        $role = Role::find(6);
        if ($role) {
            $user->assignRole($role->name);
        } else {
            return response(['success' => false, 'message' => 'Role tidak ditemukan'], 404);
        }

        $profil = Profil::first();
        $no_wa = $profil ? $profil->no_wa : 'Tertera';

        return redirect()->back()->with('success', 'Data Pendaftaran berhasil dikirimkan! Informasi selanjutnya bisa <a href="https://wa.me/' . $no_wa . '" target="_blank">Klik Link WhatsApp Ini</a>');
    }



    public function create()
    {
        return view('pendaftaran.create');
    }

    public function store(Request $request) {}



    public function edit($id)
    {
        // Mengambil data konsumen dan relasinya dengan user
        $pendaftaran = Konsumen::with('user')->findOrFail($id);

        return response()->json($pendaftaran);
    }

    public function update(Request $request, $id)
    {
        try {
            // Validasi input
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'status' => 'required|in:Aktif,Non Aktif',
                'name' => 'required|string|max:255', // Pastikan 'name' ada
                'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'alasan_reject' => 'nullable|required_if:status,Non Aktif|max:255',
            ]);

            // Ambil data konsumen yang akan diupdate berdasarkan ID konsumen
            $konsumen = Konsumen::findOrFail($id);

            // Ambil data user yang terkait dengan konsumen (berdasarkan user_id di tabel konsumen)
            $user = User::findOrFail($konsumen->user_id);

            // Inisialisasi input dari request untuk tabel konsumen
            $inputKonsumen = $request->except(['name', 'email', 'status']);

            // Inisialisasi input dari request untuk tabel users
            $inputUser = $request->only(['name', 'email', 'status']);

            // Update data konsumen
            $konsumen->update($inputKonsumen);

            // Update data user
            $user->name = $inputUser['name'];
            $user->email = $inputUser['email'];
            $user->status = $inputUser['status'];
            $user->save();

            // Simpan log histori untuk operasi Update
            $loggedInUserId = Auth::id();
            $this->simpanLogHistori('Update', 'Konsumen', $konsumen->id, $loggedInUserId, json_encode($konsumen->getOriginal()), json_encode($inputKonsumen));
            $this->simpanLogHistori('Update', 'User', $user->id, $loggedInUserId, json_encode($user->getOriginal()), json_encode($inputUser));

            // Beri respons JSON jika berhasil
            return response()->json(['message' => 'Data berhasil diupdate'], 200);
        } catch (\Exception $e) {
            // Jika terjadi kesalahan, tangkap dan kembalikan pesan error
            return response()->json(['message' => 'Terjadi kesalahan: ' . $e->getMessage()], 500);
        }
    }









    public function destroy($id) {}

    private function simpanLogHistori($aksi, $tabelAsal, $idEntitas, $pengguna, $dataLama, $dataBaru) {}
}
