<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller; 
 
use App\Models\LogHistori;
use App\Models\Dokumentasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DokumentasiController extends Controller
{
    public function index()
    {
        $title = "Halaman Dokumentasi";
        $subtitle = "Menu Dokumentasi";
        $dokumentasi = Dokumentasi::all();
       
        return view('back.dokumentasi.index', compact('dokumentasi','title','subtitle'));
    }

    public function create()
    {
        // Menampilkan form untuk membuat dokumentasi baru
        return view('dokumentasi.create');
    }

    public function store(Request $request)
    {
        try {
            // Validasi input
            $request->validate([
                'nama_dokumentasi' => 'required|unique:dokumentasi,nama_dokumentasi',
                'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',

            ], [
                'nama_dokumentasi.required' => 'Nama Dokumentasi wajib diisi.',
                'nama_dokumentasi.unique' => 'Nama Dokumentasi sudah ada.',
                'gambar.required' => 'Gambar Sldier wajib diisi.',
                'gambar.image' => 'Gambar harus dalam format jpeg, jpg, atau png',
                'gambar.mimes' => 'Format gambar harus jpeg, jpg, atau png',
                'gambar.max' => 'Ukuran gambar tidak boleh lebih dari 2 MB',

            ]);

            $input = $request->all();

            // Jika ada file gambar, proses gambar
            if ($image = $request->file('gambar')) {
                $destinationPath = 'upload/dokumentasi/';

                $originalFileName = $image->getClientOriginalName();
                $imageMimeType = $image->getMimeType();

                if (strpos($imageMimeType, 'image/') === 0) {
                    $imageName = date('YmdHis') . '_' . str_replace(' ', '_', $originalFileName);
                    $image->move($destinationPath, $imageName);

                    $sourceImagePath = public_path($destinationPath . $imageName);
                    $webpImagePath = $destinationPath . pathinfo($imageName, PATHINFO_FILENAME) . '.webp';

                    switch ($imageMimeType) {
                        case 'image/jpeg':
                            $sourceImage = @imagecreatefromjpeg($sourceImagePath);
                            break;
                        case 'image/png':
                            $sourceImage = @imagecreatefrompng($sourceImagePath);
                            break;
                        default:
                            throw new \Exception('Tipe MIME tidak didukung.');
                    }

                    if ($sourceImage !== false) {
                        imagewebp($sourceImage, $webpImagePath);
                        imagedestroy($sourceImage);
                        @unlink($sourceImagePath);
                        $input['gambar'] = pathinfo($imageName, PATHINFO_FILENAME) . '.webp';
                    } else {
                        throw new \Exception('Gagal membaca gambar asli.');
                    }
                } else {
                    throw new \Exception('Tipe MIME gambar tidak didukung.');
                }
            } else {
                $input['gambar'] = ''; // Jika tidak ada gambar yang diunggah
            }

            // Membuat dokumentasi baru
            $dokumentasi = Dokumentasi::create($input);

            // Simpan log histori untuk operasi Create
            $loggedInDokumentasiId = Auth::id();
            $this->simpanLogHistori('Create', 'Dokumentasi', $dokumentasi->id, $loggedInDokumentasiId, null, json_encode($dokumentasi));

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
        $dokumentasi = Dokumentasi::findOrFail($id);

        return response()->json($dokumentasi);
    }

    public function update(Request $request, $id)
    {
        try {
            // Validasi input
            $request->validate([
                'nama_dokumentasi' => 'required',
                'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ], [
                'nama_dokumentasi.required' => 'Nama Dokumentasi wajib diisi.',
                'gambar.image' => 'Gambar harus dalam format jpeg, jpg, atau png',
                'gambar.mimes' => 'Format gambar harus jpeg, jpg, atau png',
                'gambar.max' => 'Ukuran gambar tidak boleh lebih dari 2 MB',
            ]);

            // Ambil data dokumentasi yang akan diupdate
            $dokumentasi = Dokumentasi::findOrFail($id);

            // Inisialisasi input dari request
            $input = $request->all();

            // Jika ada file gambar, proses gambar
            if ($image = $request->file('gambar')) {
                $destinationPath = 'upload/dokumentasi/';

                // Hapus gambar lama jika ada
                if ($dokumentasi->gambar) {
                    $oldImagePath = public_path($destinationPath . $dokumentasi->gambar);
                    if (file_exists($oldImagePath)) {
                        @unlink($oldImagePath); // Hapus gambar lama
                    }
                }

                // Ambil nama file asli dan ekstensinya
                $originalFileName = $image->getClientOriginalName();
                $imageMimeType = $image->getMimeType();

                // Hanya tipe MIME gambar yang didukung
                if (strpos($imageMimeType, 'image/') === 0) {
                    // Generate nama file baru
                    $imageName = date('YmdHis') . '_' . str_replace(' ', '_', $originalFileName);
                    $image->move($destinationPath, $imageName);

                    // Path file asli dan WebP
                    $sourceImagePath = public_path($destinationPath . $imageName);
                    $webpImagePath = $destinationPath . pathinfo($imageName, PATHINFO_FILENAME) . '.webp';

                    // Konversi gambar ke WebP
                    switch ($imageMimeType) {
                        case 'image/jpeg':
                            $sourceImage = @imagecreatefromjpeg($sourceImagePath);
                            break;
                        case 'image/png':
                            $sourceImage = @imagecreatefrompng($sourceImagePath);
                            break;
                        default:
                            throw new \Exception('Tipe MIME tidak didukung.');
                    }

                    if ($sourceImage !== false) {
                        // Simpan sebagai WebP dan hapus file asli
                        imagewebp($sourceImage, $webpImagePath);
                        imagedestroy($sourceImage);
                        @unlink($sourceImagePath);

                        // Simpan nama file WebP ke database
                        $input['gambar'] = pathinfo($imageName, PATHINFO_FILENAME) . '.webp';
                    } else {
                        throw new \Exception('Gagal membaca gambar asli.');
                    }
                } else {
                    throw new \Exception('Tipe MIME gambar tidak didukung.');
                }
            }

            // Update data dokumentasi
            $dokumentasi->update($input);

            // Simpan log histori untuk operasi Update dengan dokumentasi_id yang sedang login
            $loggedInDokumentasiId = Auth::id();
            $this->simpanLogHistori('Update', 'Dokumentasi', $dokumentasi->id, $loggedInDokumentasiId, json_encode($dokumentasi->getOriginal()), json_encode($input));

            // Beri respons JSON jika berhasil
            return response()->json(['message' => 'Data berhasil diupdate'], 200);
        } catch (\Exception $e) {
            // Jika terjadi kesalahan, tangkap dan kembalikan pesan error
            return response()->json(['message' => 'Terjadi kesalahan: ' . $e->getMessage()], 500);
        }
    }






    public function destroy($id)
    {
        $dokumentasi = Dokumentasi::find($id);

        if (!$dokumentasi) {
            return response()->json(['message' => 'Data dokumentasi not found'], 404);
        }

        $oldgambarFileName = $dokumentasi->gambar; // Nama file saja
        $oldfilePath = public_path('upload/dokumentasi/' . $oldgambarFileName);

        if ($oldgambarFileName && file_exists($oldfilePath)) {
            unlink($oldfilePath);
        }

        $dokumentasi->delete();
        $loggedInDokumentasiId = Auth::id();

        // Simpan log histori untuk operasi Delete dengan dokumentasi_id yang sedang login dan informasi data yang dihapus
        $this->simpanLogHistori('Delete', 'dokumentasi', $id, $loggedInDokumentasiId, json_encode($dokumentasi), null);

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
