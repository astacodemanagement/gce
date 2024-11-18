<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller; 
 
use App\Models\LogHistori;
use App\Models\Blokir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlokirController extends Controller
{
    public function index()
    {
        $title = "Halaman Blokir";
        $subtitle = "Menu Blokir";
        $blokir = Blokir::all();
       
        return view('back.blokir.index', compact('blokir','title','subtitle'));
    }

    public function create()
    {
        // Menampilkan form untuk membuat blokir baru
        return view('blokir.create');
    }

    public function store(Request $request)
    {
        try {
            // Validasi input
            $request->validate([
                'no_wa' => 'required|unique:blokir,no_wa',
                'nama_blokir' => 'required',
               

            ], [
                'nama_blokir.required' => 'Nama Blokir wajib diisi.',
                'no_wa.required' => 'NO Wa Blokir wajib diisi.',
                'no_wa.unique' => 'No Wa Blokir sudah ada.',
                

            ]);

            $input = $request->all();

          

            // Membuat blokir baru
            $blokir = Blokir::create($input);

            // Simpan log histori untuk operasi Create
            $loggedInBlokirId = Auth::id();
            $this->simpanLogHistori('Create', 'Blokir', $blokir->id, $loggedInBlokirId, null, json_encode($blokir));

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
        $blokir = Blokir::findOrFail($id);

        return response()->json($blokir);
    }

    public function update(Request $request, $id)
    {
        try {
            // Validasi input
            $request->validate([
                'no_wa' => 'required',
                'nama_blokir' => 'required',
               

            ], [
                'nama_blokir.required' => 'Nama Blokir wajib diisi.',
                'no_wa.required' => 'NO Wa Blokir wajib diisi.',
                

            ]);

            // Ambil data blokir yang akan diupdate
            $blokir = Blokir::findOrFail($id);

            // Inisialisasi input dari request
            $input = $request->all();

       

            // Update data blokir
            $blokir->update($input);

            // Simpan log histori untuk operasi Update dengan blokir_id yang sedang login
            $loggedInBlokirId = Auth::id();
            $this->simpanLogHistori('Update', 'Blokir', $blokir->id, $loggedInBlokirId, json_encode($blokir->getOriginal()), json_encode($input));

            // Beri respons JSON jika berhasil
            return response()->json(['message' => 'Data berhasil diupdate'], 200);
        } catch (\Exception $e) {
            // Jika terjadi kesalahan, tangkap dan kembalikan pesan error
            return response()->json(['message' => 'Terjadi kesalahan: ' . $e->getMessage()], 500);
        }
    }






    public function destroy($id)
    {
        $blokir = Blokir::find($id);

        if (!$blokir) {
            return response()->json(['message' => 'Data blokir not found'], 404);
        }

        $oldgambarFileName = $blokir->gambar; // Nama file saja
        $oldfilePath = public_path('upload/blokir/' . $oldgambarFileName);

        if ($oldgambarFileName && file_exists($oldfilePath)) {
            unlink($oldfilePath);
        }

        $blokir->delete();
        $loggedInBlokirId = Auth::id();

        // Simpan log histori untuk operasi Delete dengan blokir_id yang sedang login dan informasi data yang dihapus
        $this->simpanLogHistori('Delete', 'blokir', $id, $loggedInBlokirId, json_encode($blokir), null);

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
