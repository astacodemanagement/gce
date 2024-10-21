<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller; 

use App\Models\LogHistori;
use App\Models\KategoriBerita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class KategoriBeritaController extends Controller
{
    public function index()
    {
        $title = "Halaman Kategori Berita";
        $subtitle = "Menu Kategori Berita";
        $kategori_berita = KategoriBerita::all();
        return view('back.kategori_berita.index', compact('kategori_berita','title','subtitle'));
    }

    public function create()
    {
        // Menampilkan form untuk membuat kategori_berita baru
        return view('kategori_berita.create');
    }



    public function store(Request $request)
    {
        try {
            // Validasi input
            $request->validate([
                'nama_kategori_berita' => 'required|unique:kategori_berita,nama_kategori_berita',

            ], [
                'nama_kategori_berita.required' => 'Nama KategoriBerita wajib diisi.',
                'nama_kategori_berita.unique' => 'Nama KategoriBerita sudah ada.',

            ]);

            $input = $request->all();



            // Membuat kategori_berita baru
            $kategori_berita = KategoriBerita::create($input);

            // Simpan log histori untuk operasi Create
            $loggedInKategoriBeritaId = Auth::id();
            $this->simpanLogHistori('Create', 'KategoriBerita', $kategori_berita->id, $loggedInKategoriBeritaId, null, json_encode($kategori_berita));

            return response()->json(['message' => 'Data berhasil disimpan'], 201);

        } catch (\Exception $e) {
            // Tangani error dan kembalikan respons error
            return response()->json([
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }



    public function edit($id)
    {
        $kategori_berita = KategoriBerita::findOrFail($id);

        return response()->json($kategori_berita);
    }

    public function update(Request $request, $id)
    {
        try {
            // Validasi input
            $request->validate([
                'nama_kategori_berita' => 'required',
            ], [
                'nama_kategori_berita.required' => 'Nama KategoriBerita wajib diisi.',

            ]);

            // Ambil data kategori_berita yang akan diupdate
            $kategori_berita = KategoriBerita::findOrFail($id);

            // Inisialisasi input dari request
            $input = $request->all();



            // Update data kategori_berita
            $kategori_berita->update($input);

            // Simpan log histori untuk operasi Update dengan kategori_berita_id yang sedang login
            $loggedInKategoriBeritaId = Auth::id();
            $this->simpanLogHistori('Update', 'KategoriBerita', $kategori_berita->id, $loggedInKategoriBeritaId, json_encode($kategori_berita->getOriginal()), json_encode($input));

            // Beri respons JSON jika berhasil
            return response()->json(['message' => 'Data berhasil diupdate'], 200);
        } catch (\Exception $e) {
            // Jika terjadi kesalahan, tangkap dan kembalikan pesan error
            return response()->json(['message' => 'Terjadi kesalahan: ' . $e->getMessage()], 500);
        }
    }






    public function destroy($id)
    {
        $kategori_berita = KategoriBerita::find($id);

        if (!$kategori_berita) {
            return response()->json(['message' => 'Data kategori_berita not found'], 404);
        }


        $kategori_berita->delete();
        $loggedInKategoriBeritaId = Auth::id();

        // Simpan log histori untuk operasi Delete dengan kategori_berita_id yang sedang login dan informasi data yang dihapus
        $this->simpanLogHistori('Delete', 'kategori_berita', $id, $loggedInKategoriBeritaId, json_encode($kategori_berita), null);

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
