<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller; 
 
use App\Models\LogHistori;
use App\Models\Kelebihan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KelebihanController extends Controller
{
    public function index()
    {
        $title = "Halaman Kelebihan";
        $subtitle = "Menu Kelebihan";
        $kelebihan = Kelebihan::all();
       
        return view('back.kelebihan.index', compact('kelebihan','title','subtitle'));
    }

    public function create()
    {
        // Menampilkan form untuk membuat kelebihan baru
        return view('kelebihan.create');
    }

    public function store(Request $request)
    {
        try {
            // Validasi input
            $request->validate([
                'nama_kelebihan' => 'required|unique:kelebihan,nama_kelebihan',
                'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',

            ], [
                'nama_kelebihan.required' => 'Nama Kelebihan wajib diisi.',
                'nama_kelebihan.unique' => 'Nama Kelebihan sudah ada.',
                'gambar.required' => 'Gambar Sldier wajib diisi.',
                'gambar.image' => 'Gambar harus dalam format jpeg, jpg, atau png',
                'gambar.mimes' => 'Format gambar harus jpeg, jpg, atau png',
                'gambar.max' => 'Ukuran gambar tidak boleh lebih dari 2 MB',

            ]);

            $input = $request->all();

            // Jika ada file gambar, proses gambar
            if ($image = $request->file('gambar')) {
                $destinationPath = 'upload/kelebihan/';

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

            // Membuat kelebihan baru
            $kelebihan = Kelebihan::create($input);

            // Simpan log histori untuk operasi Create
            $loggedInKelebihanId = Auth::id();
            $this->simpanLogHistori('Create', 'Kelebihan', $kelebihan->id, $loggedInKelebihanId, null, json_encode($kelebihan));

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
        $kelebihan = Kelebihan::findOrFail($id);

        return response()->json($kelebihan);
    }

    public function update(Request $request, $id)
    {
        try {
            // Validasi input
            $request->validate([
                'nama_kelebihan' => 'required',
                'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ], [
                'nama_kelebihan.required' => 'Nama Kelebihan wajib diisi.',
                'gambar.image' => 'Gambar harus dalam format jpeg, jpg, atau png',
                'gambar.mimes' => 'Format gambar harus jpeg, jpg, atau png',
                'gambar.max' => 'Ukuran gambar tidak boleh lebih dari 2 MB',
            ]);

            // Ambil data kelebihan yang akan diupdate
            $kelebihan = Kelebihan::findOrFail($id);

            // Inisialisasi input dari request
            $input = $request->all();

            // Jika ada file gambar, proses gambar
            if ($image = $request->file('gambar')) {
                $destinationPath = 'upload/kelebihan/';

                // Hapus gambar lama jika ada
                if ($kelebihan->gambar) {
                    $oldImagePath = public_path($destinationPath . $kelebihan->gambar);
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

            // Update data kelebihan
            $kelebihan->update($input);

            // Simpan log histori untuk operasi Update dengan kelebihan_id yang sedang login
            $loggedInKelebihanId = Auth::id();
            $this->simpanLogHistori('Update', 'Kelebihan', $kelebihan->id, $loggedInKelebihanId, json_encode($kelebihan->getOriginal()), json_encode($input));

            // Beri respons JSON jika berhasil
            return response()->json(['message' => 'Data berhasil diupdate'], 200);
        } catch (\Exception $e) {
            // Jika terjadi kesalahan, tangkap dan kembalikan pesan error
            return response()->json(['message' => 'Terjadi kesalahan: ' . $e->getMessage()], 500);
        }
    }






    public function destroy($id)
    {
        $kelebihan = Kelebihan::find($id);

        if (!$kelebihan) {
            return response()->json(['message' => 'Data kelebihan not found'], 404);
        }

        $oldgambarFileName = $kelebihan->gambar; // Nama file saja
        $oldfilePath = public_path('upload/kelebihan/' . $oldgambarFileName);

        if ($oldgambarFileName && file_exists($oldfilePath)) {
            unlink($oldfilePath);
        }

        $kelebihan->delete();
        $loggedInKelebihanId = Auth::id();

        // Simpan log histori untuk operasi Delete dengan kelebihan_id yang sedang login dan informasi data yang dihapus
        $this->simpanLogHistori('Delete', 'kelebihan', $id, $loggedInKelebihanId, json_encode($kelebihan), null);

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
