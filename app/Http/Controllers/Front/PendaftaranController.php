<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

use App\Models\LogHistori;
use App\Models\Konsumen;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    








    public function destroy($id)
    {
        $pendaftaran = Konsumen::find($id);

        if (!$pendaftaran) {
            return response()->json(['message' => 'Data pendaftaran not found'], 404);
        }

        $oldgambarFileName = $pendaftaran->gambar; // Nama file saja
        $oldfilePath = public_path('upload/pendaftaran/' . $oldgambarFileName);

        if ($oldgambarFileName && file_exists($oldfilePath)) {
            unlink($oldfilePath);
        }

        $pendaftaran->delete();
        $loggedInKonsumenId = Auth::id();

        // Simpan log histori untuk operasi Delete dengan pendaftaran_id yang sedang login dan informasi data yang dihapus
        $this->simpanLogHistori('Delete', 'pendaftaran', $id, $loggedInKonsumenId, json_encode($pendaftaran), null);

        return response()->json(['message' => 'Data Berhasil Dihapus']);
    }

    private function simpanLogHistori($aksi, $tabelAsal, $idEntitas, $pengguna, $dataLama, $dataBaru)
    {
        $log = new LogHistori();
        $log->tabel_asal = $tabelAsal;
        $log->id_entitas = $idEntitas;
        $log->aksi = $aksi;
        $log->waktu = now(); // Menggunakan waktu saat ini
        $log->pengguna = $pengguna;
        $log->data_lama = $dataLama;
        $log->data_baru = $dataBaru;
        $log->save();
    }
}
