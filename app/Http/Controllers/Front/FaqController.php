<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller; 
 
use App\Models\LogHistori;
use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FaqController extends Controller
{
    public function index()
    {
        $title = "Halaman Faq";
        $subtitle = "Menu Faq";
        $faq = Faq::all();
       
        return view('back.faq.index', compact('faq','title','subtitle'));
    }

    public function create()
    {
        // Menampilkan form untuk membuat faq baru
        return view('faq.create');
    }

    public function store(Request $request)
    {
        try {
            // Validasi input
            $request->validate([
                'nama_faq' => 'required|unique:faq,nama_faq',
               

            ], [
                'nama_faq.required' => 'Nama Faq wajib diisi.',
                'nama_faq.unique' => 'Nama Faq sudah ada.',
                

            ]);

            $input = $request->all();

          

            // Membuat faq baru
            $faq = Faq::create($input);

            // Simpan log histori untuk operasi Create
            $loggedInFaqId = Auth::id();
            $this->simpanLogHistori('Create', 'Faq', $faq->id, $loggedInFaqId, null, json_encode($faq));

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
        $faq = Faq::findOrFail($id);

        return response()->json($faq);
    }

    public function update(Request $request, $id)
    {
        try {
            // Validasi input
            $request->validate([
                'nama_faq' => 'required',
               
            ], [
                'nama_faq.required' => 'Nama Faq wajib diisi.',
                
            ]);

            // Ambil data faq yang akan diupdate
            $faq = Faq::findOrFail($id);

            // Inisialisasi input dari request
            $input = $request->all();

       

            // Update data faq
            $faq->update($input);

            // Simpan log histori untuk operasi Update dengan faq_id yang sedang login
            $loggedInFaqId = Auth::id();
            $this->simpanLogHistori('Update', 'Faq', $faq->id, $loggedInFaqId, json_encode($faq->getOriginal()), json_encode($input));

            // Beri respons JSON jika berhasil
            return response()->json(['message' => 'Data berhasil diupdate'], 200);
        } catch (\Exception $e) {
            // Jika terjadi kesalahan, tangkap dan kembalikan pesan error
            return response()->json(['message' => 'Terjadi kesalahan: ' . $e->getMessage()], 500);
        }
    }






    public function destroy($id)
    {
        $faq = Faq::find($id);

        if (!$faq) {
            return response()->json(['message' => 'Data faq not found'], 404);
        }

        $oldgambarFileName = $faq->gambar; // Nama file saja
        $oldfilePath = public_path('upload/faq/' . $oldgambarFileName);

        if ($oldgambarFileName && file_exists($oldfilePath)) {
            unlink($oldfilePath);
        }

        $faq->delete();
        $loggedInFaqId = Auth::id();

        // Simpan log histori untuk operasi Delete dengan faq_id yang sedang login dan informasi data yang dihapus
        $this->simpanLogHistori('Delete', 'faq', $id, $loggedInFaqId, json_encode($faq), null);

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
