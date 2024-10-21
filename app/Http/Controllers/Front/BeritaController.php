<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller; 

use App\Models\LogHistori;
use App\Models\Berita;
use App\Models\KategoriBerita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;


class BeritaController extends Controller
{
 
    public function index()
    {
        $title = "Halaman Berita";
        $subtitle = "Menu Berita";
        $kategoriBerita = KategoriBerita::all();
        $berita = Cache::remember('berita', 10, function () {
            return Berita::with('kategoriBerita')->orderBy('id', 'desc')->get();
        });

        return view('back.berita.index', compact('title', 'subtitle', 'berita','kategoriBerita'));
    }

    public function getKategoriBeritaData(Request $request)
    {
        $term = $request->term;
        $data = KategoriBerita::where('nama_kategori_berita', 'LIKE', '%' . $term . '%')->get();
    
        return response()->json($data);
    }
 
 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }



    public function store(Request $request)
    {

        $request->validate([
            'kategori_berita_id' => 'required',
            'judul_berita' => 'required|unique:berita,judul_berita',
            'tanggal_posting' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi file gambar
        ], [
            'kategori_berita_id.required' => 'Kategori berita wajib diisi.',
            'judul_berita.required' => 'Judul berita wajib diisi.',
            'judul_berita.unique' => 'Judul berita sudah ada.',
            'tanggal_posting.required' => 'Tanggal Posting wajib diisi.',
            'gambar.required' => 'Gambar wajib diisi.',
            'gambar.image' => 'Gambar harus dalam format jpeg, jpg, atau png',
            'gambar.mimes' => 'Format gambar harus jpeg, jpg, atau png',
            'gambar.max' => 'Ukuran gambar tidak boleh lebih dari 2 MB',
        ]);

        $input = $request->all();

        if ($image = $request->file('gambar')) {
            $destinationPath = 'upload/berita/';

            // Mengambil nama file asli dan ekstensinya
            $originalFileName = $image->getClientOriginalName();

            // Membaca tipe MIME dari file gambar
            $imageMimeType = $image->getMimeType();

            // Menyaring hanya tipe MIME gambar yang didukung (misalnya, image/jpeg, image/png, dll.)
            if (strpos($imageMimeType, 'image/') === 0) {
                // Menggabungkan waktu dengan nama file asli
                $imageName = date('YmdHis') . '_' . str_replace(' ', '_', $originalFileName);

                // Simpan gambar asli ke tujuan yang diinginkan
                $image->move($destinationPath, $imageName);

                // Path gambar asli
                $sourceImagePath = public_path($destinationPath . $imageName);

                // Path untuk menyimpan gambar WebP
                $webpImagePath = $destinationPath . pathinfo($imageName, PATHINFO_FILENAME) . '.webp';

                // Membaca gambar asli dan mengonversinya ke WebP jika tipe MIME-nya didukung
                switch ($imageMimeType) {
                    case 'image/jpeg':
                        $sourceImage = @imagecreatefromjpeg($sourceImagePath);
                        break;
                    case 'image/png':
                        $sourceImage = @imagecreatefrompng($sourceImagePath);
                        break;
                        // Tambahkan jenis MIME lain jika diperlukan
                    default:
                        // Jenis MIME tidak didukung, tangani kasus ini sesuai kebutuhan Anda
                        // Misalnya, tampilkan pesan kesalahan atau lakukan tindakan yang sesuai
                        break;
                }

                // Jika gambar asli berhasil dibaca
                if ($sourceImage !== false) {
                    // Membuat gambar baru dalam format WebP
                    imagewebp($sourceImage, $webpImagePath);

                    // Hapus gambar asli dari memori
                    imagedestroy($sourceImage);

                    // Hapus file asli setelah konversi selesai
                    @unlink($sourceImagePath);

                    // Simpan hanya nama file gambar ke dalam array input
                    $input['gambar'] = pathinfo($imageName, PATHINFO_FILENAME) . '.webp';
                } else {
                    // Gagal membaca gambar asli, tangani kasus ini sesuai kebutuhan Anda
                }
            } else {
                // Tipe MIME gambar tidak didukung, tangani kasus ini sesuai kebutuhan Anda
            }
        } else {
            // Set nilai default untuk gambar jika tidak ada gambar yang diunggah
            $input['gambar'] = '';
        }

        // Membuat berita baru dan mendapatkan data pengguna yang baru dibuat
        $berita = Berita::create($input);

        // Mendapatkan ID pengguna yang sedang login
        $loggedInBeritaId = Auth::id();

        // Simpan log histori untuk operasi Create dengan berita_id yang sedang login
        $this->simpanLogHistori('Create', 'Berita', $berita->id, $loggedInBeritaId, null, json_encode($berita));

        return redirect('/berita')->with('message', 'Data berhasil ditambahkan');
    }




    /** 
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $berita = Berita::findOrFail($id);

        return response()->json($berita);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


  

    public function update(Request $request, $id)
    {
        try {
            // Validasi input
            $request->validate([
                'kategori_berita_id' => 'required',
                'judul_berita' => 'required',
                'tanggal_posting' => 'required',
                'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi file gambar
            ], [
                'kategori_berita_id.required' => 'Kategori berita wajib diisi.',
                'judul_berita.required' => 'Judul berita wajib diisi.',
                'tanggal_posting.required' => 'Tanggal Posting wajib diisi.',
                'gambar.image' => 'Gambar harus dalam format jpeg, jpg, atau png',
                'gambar.mimes' => 'Format gambar harus jpeg, jpg, atau png',
                'gambar.max' => 'Ukuran gambar tidak boleh lebih dari 2 MB',
            ]);
    

            // Ambil data berita yang akan diupdate
            $berita = Berita::findOrFail($id);

            // Inisialisasi input dari request
            $input = $request->all();

            // Jika ada file gambar, proses gambar
            if ($image = $request->file('gambar')) {
                $destinationPath = 'upload/berita/';

                // Hapus gambar lama jika ada
                if ($berita->gambar) {
                    $oldImagePath = public_path($destinationPath . $berita->gambar);
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

            // Update data berita
            $berita->update($input);

            // Simpan log histori untuk operasi Update dengan berita_id yang sedang login
            $loggedInBeritaId = Auth::id();
            $this->simpanLogHistori('Update', 'Berita', $berita->id, $loggedInBeritaId, json_encode($berita->getOriginal()), json_encode($input));

            // Beri respons JSON jika berhasil
            return response()->json(['message' => 'Data berhasil diupdate'], 200);
        } catch (\Exception $e) {
            // Jika terjadi kesalahan, tangkap dan kembalikan pesan error
            return response()->json(['message' => 'Terjadi kesalahan: ' . $e->getMessage()], 500);
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $berita = Berita::find($id);

        if (!$berita) {
            return response()->json(['message' => 'Data berita not found'], 404);
        }

        $oldgambarFileName = $berita->file; // Nama file saja
        $oldfilePath = public_path('upload/berita/' . $oldgambarFileName);

        if ($oldgambarFileName && file_exists($oldfilePath)) {
            unlink($oldfilePath);
        }

        $berita->delete();
        $loggedInBeritaId = Auth::id();

        // Simpan log histori untuk operasi Delete dengan berita_id yang sedang login dan informasi data yang dihapus
        $this->simpanLogHistori('Delete', 'berita', $id, $loggedInBeritaId, json_encode($berita), null);

        return response()->json(['message' => 'Data Berhasil Dihapus']);
    }

    // ========================================= Rubah jika ada relasi ke tabel lain

    // Fungsi untuk menyimpan log histori
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
