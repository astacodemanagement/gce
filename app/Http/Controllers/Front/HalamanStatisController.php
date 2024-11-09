<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

use App\Models\LogHistori;
use App\Models\HalamanStatis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HalamanStatisController extends Controller
{
    public function index()
    {
        $title = "Halaman Halaman Statis";
        $subtitle = "Menu Halaman Statis";
        $halaman_statis = HalamanStatis::all();

        return view('back.halaman_statis.index', compact('halaman_statis', 'title', 'subtitle'));
    }

    public function create()
    {
        // Menampilkan form untuk membuat halaman_statis baru
        return view('halaman_statis.create');
    }

    public function store(Request $request)
    {
        try {
            // Validasi input
            $request->validate([
                'nama_halaman_statis' => 'required|unique:halaman_statis,nama_halaman_statis',
                'slug' => 'required',
                'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',

            ], [
                'nama_halaman_statis.required' => 'Nama Halaman Statis wajib diisi.',
                'nama_halaman_statis.unique' => 'Nama Halaman Statis sudah ada.',
                'slug.required' => 'Slug wajib diisi.',
                'gambar.required' => 'Gambar Sldier wajib diisi.',
                'gambar.image' => 'Gambar harus dalam format jpeg, jpg, atau png',
                'gambar.mimes' => 'Format gambar harus jpeg, jpg, atau png',
                'gambar.max' => 'Ukuran gambar tidak boleh lebih dari 2 MB',

            ]);

            $input = $request->all();

            // Jika ada file gambar, proses gambar
            if ($image = $request->file('gambar')) {
                $destinationPath = 'upload/halaman_statis/';

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

            $appUrl = config('app.url'); // Mendapatkan URL dari .env
            $input['link'] = $appUrl . '/halaman/' . $request->slug; // Menghasilkan link


            // Membuat halaman_statis baru
            $halaman_statis = HalamanStatis::create($input);

            // Simpan log histori untuk operasi Create
            $loggedInHalamanStatisId = Auth::id();
            $this->simpanLogHistori('Create', 'HalamanStatis', $halaman_statis->id, $loggedInHalamanStatisId, null, json_encode($halaman_statis));

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
        $halaman_statis = HalamanStatis::findOrFail($id);

        return response()->json($halaman_statis);
    }

    public function update(Request $request, $id)
    {
        try {
            // Validasi input
            $request->validate([
                'nama_halaman_statis' => 'required',
                'slug' => 'required',
                'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ], [
                'nama_halaman_statis.required' => 'Nama Halaman Statis wajib diisi.',
                'slug.required' => 'Slug wajib diisi.',
                'gambar.image' => 'Gambar harus dalam format jpeg, jpg, atau png',
                'gambar.mimes' => 'Format gambar harus jpeg, jpg, atau png',
                'gambar.max' => 'Ukuran gambar tidak boleh lebih dari 2 MB',
            ]);

            // Ambil data halaman_statis yang akan diupdate
            $halaman_statis = HalamanStatis::findOrFail($id);

            // Inisialisasi input dari request
            $input = $request->all();

            // Jika ada file gambar, proses gambar
            if ($image = $request->file('gambar')) {
                $destinationPath = 'upload/halaman_statis/';

                // Hapus gambar lama jika ada
                if ($halaman_statis->gambar) {
                    $oldImagePath = public_path($destinationPath . $halaman_statis->gambar);
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

            // Update data halaman_statis
            $halaman_statis->update($input);

            // Membangun URL berdasarkan slug yang diperbarui
            $appUrl = config('app.url'); // Mendapatkan URL dari .env
            $input['link'] = $appUrl . '/halaman/' . $halaman_statis->slug; // Menghasilkan link

            // Simpan link ke database
            $halaman_statis->link = $input['link'];
            $halaman_statis->save();

            // Simpan log histori untuk operasi Update dengan halaman_statis_id yang sedang login
            $loggedInHalamanStatisId = Auth::id();
            $this->simpanLogHistori('Update', 'HalamanStatis', $halaman_statis->id, $loggedInHalamanStatisId, json_encode($halaman_statis->getOriginal()), json_encode($input));

            // Beri respons JSON jika berhasil
            return response()->json(['message' => 'Data berhasil diupdate'], 200);
        } catch (\Exception $e) {
            // Jika terjadi kesalahan, tangkap dan kembalikan pesan error
            return response()->json(['message' => 'Terjadi kesalahan: ' . $e->getMessage()], 500);
        }
    }


    public function destroy($id)
    {
        $halaman_statis = HalamanStatis::find($id);

        if (!$halaman_statis) {
            return response()->json(['message' => 'Data halaman_statis not found'], 404);
        }

        $oldgambarFileName = $halaman_statis->gambar; // Nama file saja
        $oldfilePath = public_path('upload/halaman_statis/' . $oldgambarFileName);

        if ($oldgambarFileName && file_exists($oldfilePath)) {
            unlink($oldfilePath);
        }

        $halaman_statis->delete();
        $loggedInHalamanStatisId = Auth::id();

        // Simpan log histori untuk operasi Delete dengan halaman_statis_id yang sedang login dan informasi data yang dihapus
        $this->simpanLogHistori('Delete', 'halaman_statis', $id, $loggedInHalamanStatisId, json_encode($halaman_statis), null);

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
