<?php

namespace App\Http\Controllers;

use App\Models\LogHistori;
use App\Models\Profil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prf = Profil::all();
        return view('profil.index', compact('prf'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profil.create');
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
    // Metode untuk menyimpan data profil
    public function store(Request $request) {}


    public function edit($id)
    {
        $profil = Profil::findOrFail($id);
        return response()->json($profil);
    }

    public function update(Request $request, $id)
    {
        try {
            // Validasi input
            $request->validate([
                'nama_profil' => 'required',
                'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:6048',
                'logo' => 'image|mimes:jpeg,png,jpg,gif|max:6048',
                'favicon' => 'image|mimes:jpeg,png,jpg,gif|max:6048',
                'banner' => 'image|mimes:jpeg,png,jpg,gif|max:6048',
            ], [
                'nama_profil.required' => 'Nama Profil wajib diisi.',
                'gambar.image' => 'Gambar harus dalam format jpeg, jpg, atau png',
                'gambar.mimes' => 'Format gambar harus jpeg, jpg, atau png',
                'gambar.max' => 'Ukuran gambar tidak boleh lebih dari 2 MB',
                 'logo.image' => 'Gambar harus dalam format jpeg, jpg, atau png',
                'logo.mimes' => 'Format logo harus jpeg, jpg, atau png',
                'logo.max' => 'Ukuran logo tidak boleh lebih dari 6 MB',
                'favicon.image' => 'Favicon harus dalam format jpeg, jpg, atau png',
                'favicon.mimes' => 'Format favicon harus jpeg, jpg, atau png',
                'favicon.max' => 'Ukuran favicon tidak boleh lebih dari 6 MB',
                'banner.image' => 'Favicon harus dalam format jpeg, jpg, atau png',
                'banner.mimes' => 'Format banner harus jpeg, jpg, atau png',
                'banner.max' => 'Ukuran banner tidak boleh lebih dari 6 MB',
            ]);

            // Ambil data profil yang akan diupdate
            $profil = Profil::findOrFail($id);

            // Inisialisasi input dari request
            $input = $request->all();

            // Jika ada file gambar, proses gambar
            if ($image = $request->file('gambar')) {
                $destinationPath = 'upload/profil/';

                // Hapus gambar lama jika ada
                if ($profil->gambar) {
                    $oldImagePath = public_path($destinationPath . $profil->gambar);
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

            
            // Cek apakah logo diupload
            if ($request->hasFile('logo')) {
                // Hapus logo sebelumnya jika ada
                $oldPictureFileName = $profil->logo;
                if ($oldPictureFileName) {
                    $oldFilePath = public_path('upload/profil/' . $oldPictureFileName);
                    if (file_exists($oldFilePath)) {
                        unlink($oldFilePath);
                    }
                }

                $image = $request->file('logo');
                $destinationPath = 'upload/profil/';

                // Mengambil nama file asli dan ekstensinya
                $originalFileName = $image->getClientOriginalName();

                // Membaca tipe MIME dari file logo
                $imageMimeType = $image->getMimeType();

                // Menyaring hanya tipe MIME logo yang didukung (misalnya, image/jpeg, image/png, dll.)
                if (strpos($imageMimeType, 'image/') === 0) {
                    // Menggabungkan waktu dengan nama file asli
                    $imageName = date('YmdHis') . '_' . str_replace(' ', '_', $originalFileName);

                    // Simpan logo asli ke tujuan yang diinginkan
                    $image->move($destinationPath, $imageName);

                    // Path logo asli
                    $sourceImagePath = public_path($destinationPath . $imageName);

                    // Path untuk menyimpan logo WebP
                    $webpImagePath = $destinationPath . pathinfo($imageName, PATHINFO_FILENAME) . '.webp';

                    // Membaca logo asli dan mengonversinya ke WebP jika tipe MIME-nya didukung
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

                    // Jika logo asli berhasil dibaca
                    if ($sourceImage !== false) {
                        // Membuat logo baru dalam format WebP
                        imagewebp($sourceImage, $webpImagePath);

                        // Hapus logo asli dari memori
                        imagedestroy($sourceImage);

                        // Hapus file asli setelah konversi selesai
                        @unlink($sourceImagePath);

                        // Simpan hanya nama file logo ke dalam atribut profil
                        $input['logo'] = pathinfo($imageName, PATHINFO_FILENAME) . '.webp';
                    } else {
                        // Gagal membaca logo asli, tangani kasus ini sesuai kebutuhan Anda
                    }
                } else {
                    // Tipe MIME logo tidak didukung, tangani kasus ini sesuai kebutuhan Anda
                }
            }


            if ($request->hasFile('favicon')) {
                // Hapus favicon sebelumnya jika ada
                $oldPictureFileName = $profil->favicon;
                if ($oldPictureFileName) {
                    $oldFilePath = public_path('upload/profil/' . $oldPictureFileName);
                    if (file_exists($oldFilePath)) {
                        unlink($oldFilePath);
                    }
                }

                $image = $request->file('favicon');
                $destinationPath = 'upload/profil/';

                // Mengambil nama file asli dan ekstensinya
                $originalFileName = $image->getClientOriginalName();

                // Membaca tipe MIME dari file favicon
                $imageMimeType = $image->getMimeType();

                // Menyaring hanya tipe MIME favicon yang didukung (misalnya, image/jpeg, image/png, dll.)
                if (strpos($imageMimeType, 'image/') === 0) {
                    // Menggabungkan waktu dengan nama file asli
                    $imageName = date('YmdHis') . '_' . str_replace(' ', '_', $originalFileName);

                    // Simpan favicon asli ke tujuan yang diinginkan
                    $image->move($destinationPath, $imageName);

                    // Path favicon asli
                    $sourceImagePath = public_path($destinationPath . $imageName);

                    // Path untuk menyimpan favicon WebP
                    $webpImagePath = $destinationPath . pathinfo($imageName, PATHINFO_FILENAME) . '.webp';

                    // Membaca favicon asli dan mengonversinya ke WebP jika tipe MIME-nya didukung
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

                    // Jika favicon asli berhasil dibaca
                    if ($sourceImage !== false) {
                        // Membuat favicon baru dalam format WebP
                        imagewebp($sourceImage, $webpImagePath);

                        // Hapus favicon asli dari memori
                        imagedestroy($sourceImage);

                        // Hapus file asli setelah konversi selesai
                        @unlink($sourceImagePath);

                        // Simpan hanya nama file favicon ke dalam atribut profil
                        $input['favicon'] = pathinfo($imageName, PATHINFO_FILENAME) . '.webp';
                    } else {
                        // Gagal membaca favicon asli, tangani kasus ini sesuai kebutuhan Anda
                    }
                } else {
                    // Tipe MIME favicon tidak didukung, tangani kasus ini sesuai kebutuhan Anda
                }
            }


            if ($request->hasFile('banner')) {
                // Hapus banner sebelumnya jika ada
                $oldPictureFileName = $profil->banner;
                if ($oldPictureFileName) {
                    $oldFilePath = public_path('upload/profil/' . $oldPictureFileName);
                    if (file_exists($oldFilePath)) {
                        unlink($oldFilePath);
                    }
                }

                $image = $request->file('banner');
                $destinationPath = 'upload/profil/';

                // Mengambil nama file asli dan ekstensinya
                $originalFileName = $image->getClientOriginalName();

                // Membaca tipe MIME dari file banner
                $imageMimeType = $image->getMimeType();

                // Menyaring hanya tipe MIME banner yang didukung (misalnya, image/jpeg, image/png, dll.)
                if (strpos($imageMimeType, 'image/') === 0) {
                    // Menggabungkan waktu dengan nama file asli
                    $imageName = date('YmdHis') . '_' . str_replace(' ', '_', $originalFileName);

                    // Simpan banner asli ke tujuan yang diinginkan
                    $image->move($destinationPath, $imageName);

                    // Path banner asli
                    $sourceImagePath = public_path($destinationPath . $imageName);

                    // Path untuk menyimpan banner WebP
                    $webpImagePath = $destinationPath . pathinfo($imageName, PATHINFO_FILENAME) . '.webp';

                    // Membaca banner asli dan mengonversinya ke WebP jika tipe MIME-nya didukung
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

                    // Jika banner asli berhasil dibaca
                    if ($sourceImage !== false) {
                        // Membuat banner baru dalam format WebP
                        imagewebp($sourceImage, $webpImagePath);

                        // Hapus banner asli dari memori
                        imagedestroy($sourceImage);

                        // Hapus file asli setelah konversi selesai
                        @unlink($sourceImagePath);

                        // Simpan hanya nama file banner ke dalam atribut profil
                        $input['banner'] = pathinfo($imageName, PATHINFO_FILENAME) . '.webp';
                    } else {
                        // Gagal membaca banner asli, tangani kasus ini sesuai kebutuhan Anda
                    }
                } else {
                    // Tipe MIME banner tidak didukung, tangani kasus ini sesuai kebutuhan Anda
                }
            }

              


            // Update data profil
            $profil->update($input);

            // Simpan log histori untuk operasi Update dengan profil_id yang sedang login
            $loggedInProfilId = Auth::id();
            $this->simpanLogHistori('Update', 'Profil', $profil->id, $loggedInProfilId, json_encode($profil->getOriginal()), json_encode($input));

            // Beri respons JSON jika berhasil
            return response()->json(['message' => 'Data berhasil diupdate'], 200);
        } catch (\Exception $e) {
            // Jika terjadi kesalahan, tangkap dan kembalikan pesan error
            return response()->json(['message' => 'Terjadi kesalahan: ' . $e->getMessage()], 500);
        }
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


    // public function update(Request $request, $id)
    // {
    //     // Ambil data profil yang akan diperbarui
    //     $profil = Profil::findOrFail($id);

    //     // Validasi request
    //     $request->validate([
    //         'nama_profil' => 'required',
    //         'alias' => 'required',
    //         'no_telp' => 'required',
    //         'email' => 'required|email',
    //         'alamat' => 'required',
    //         'biaya_admin' => 'required|numeric',
    //         'biaya_pembatalan' => 'required|numeric',
    //         'no_rekening' => 'required',
    //         'bank' => 'required',
    //         'atas_nama' => 'required',
    //         'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048',  
    //         'link' => 'required'
    //     ]);

    //     // Inisialisasi input dari request
    //     $input = $request->all();

    //     // Jika ada file gambar, proses gambar
    //     if ($image = $request->file('gambar')) {
    //         $destinationPath = 'upload/profil/';

    //         // Hapus gambar lama jika ada
    //         if ($profil->gambar) {
    //             $oldImagePath = public_path($destinationPath . $profil->gambar);
    //             if (file_exists($oldImagePath)) {
    //                 @unlink($oldImagePath); // Hapus gambar lama
    //             }
    //         }

    //         // Ambil nama file asli dan ekstensinya
    //         $originalFileName = $image->getClientOriginalName();
    //         $imageMimeType = $image->getMimeType();

    //         // Hanya tipe MIME gambar yang didukung
    //         if (strpos($imageMimeType, 'image/') === 0) {
    //             // Generate nama file baru
    //             $imageName = date('YmdHis') . '_' . str_replace(' ', '_', $originalFileName);
    //             $image->move($destinationPath, $imageName);

    //             // Path file asli dan WebP
    //             $sourceImagePath = public_path($destinationPath . $imageName);
    //             $webpImagePath = $destinationPath . pathinfo($imageName, PATHINFO_FILENAME) . '.webp';

    //             // Konversi gambar ke WebP
    //             switch ($imageMimeType) {
    //                 case 'image/jpeg':
    //                     $sourceImage = @imagecreatefromjpeg($sourceImagePath);
    //                     break;
    //                 case 'image/png':
    //                     $sourceImage = @imagecreatefrompng($sourceImagePath);
    //                     break;
    //                 default:
    //                     throw new \Exception('Tipe MIME tidak didukung.');
    //             }

    //             if ($sourceImage !== false) {
    //                 // Simpan sebagai WebP dan hapus file asli
    //                 imagewebp($sourceImage, $webpImagePath);
    //                 imagedestroy($sourceImage);
    //                 @unlink($sourceImagePath);

    //                 // Simpan nama file WebP ke database
    //                 $input['gambar'] = pathinfo($imageName, PATHINFO_FILENAME) . '.webp';
    //             } else {
    //                 throw new \Exception('Gagal membaca gambar asli.');
    //             }
    //         } else {
    //             throw new \Exception('Tipe MIME gambar tidak didukung.');
    //         }
    //     }

    //     if ($image = $request->file('logo')) {
    //         $destinationPath = 'upload/profil/';

    //         // Hapus logo lama jika ada
    //         if ($profil->logo) {
    //             $oldImagePath = public_path($destinationPath . $profil->logo);
    //             if (file_exists($oldImagePath)) {
    //                 @unlink($oldImagePath); // Hapus logo lama
    //             }
    //         }

    //         // Ambil nama file asli dan ekstensinya
    //         $originalFileName = $image->getClientOriginalName();
    //         $imageMimeType = $image->getMimeType();

    //         // Hanya tipe MIME logo yang didukung
    //         if (strpos($imageMimeType, 'image/') === 0) {
    //             // Generate nama file baru
    //             $imageName = date('YmdHis') . '_' . str_replace(' ', '_', $originalFileName);
    //             $image->move($destinationPath, $imageName);

    //             // Path file asli dan WebP
    //             $sourceImagePath = public_path($destinationPath . $imageName);
    //             $webpImagePath = $destinationPath . pathinfo($imageName, PATHINFO_FILENAME) . '.webp';

    //             // Konversi logo ke WebP
    //             switch ($imageMimeType) {
    //                 case 'image/jpeg':
    //                     $sourceImage = @imagecreatefromjpeg($sourceImagePath);
    //                     break;
    //                 case 'image/png':
    //                     $sourceImage = @imagecreatefrompng($sourceImagePath);
    //                     break;
    //                 default:
    //                     throw new \Exception('Tipe MIME tidak didukung.');
    //             }

    //             if ($sourceImage !== false) {
    //                 // Simpan sebagai WebP dan hapus file asli
    //                 imagewebp($sourceImage, $webpImagePath);
    //                 imagedestroy($sourceImage);
    //                 @unlink($sourceImagePath);

    //                 // Simpan nama file WebP ke database
    //                 $input['logo'] = pathinfo($imageName, PATHINFO_FILENAME) . '.webp';
    //             } else {
    //                 throw new \Exception('Gagal membaca logo asli.');
    //             }
    //         } else {
    //             throw new \Exception('Tipe MIME logo tidak didukung.');
    //         }
    //     }

    //     if ($image = $request->file('favicon')) {
    //         $destinationPath = 'upload/profil/';

    //         // Hapus favicon lama jika ada
    //         if ($profil->favicon) {
    //             $oldImagePath = public_path($destinationPath . $profil->favicon);
    //             if (file_exists($oldImagePath)) {
    //                 @unlink($oldImagePath); // Hapus favicon lama
    //             }
    //         }

    //         // Ambil nama file asli dan ekstensinya
    //         $originalFileName = $image->getClientOriginalName();
    //         $imageMimeType = $image->getMimeType();

    //         // Hanya tipe MIME favicon yang didukung
    //         if (strpos($imageMimeType, 'image/') === 0) {
    //             // Generate nama file baru
    //             $imageName = date('YmdHis') . '_' . str_replace(' ', '_', $originalFileName);
    //             $image->move($destinationPath, $imageName);

    //             // Path file asli dan WebP
    //             $sourceImagePath = public_path($destinationPath . $imageName);
    //             $webpImagePath = $destinationPath . pathinfo($imageName, PATHINFO_FILENAME) . '.webp';

    //             // Konversi favicon ke WebP
    //             switch ($imageMimeType) {
    //                 case 'image/jpeg':
    //                     $sourceImage = @imagecreatefromjpeg($sourceImagePath);
    //                     break;
    //                 case 'image/png':
    //                     $sourceImage = @imagecreatefrompng($sourceImagePath);
    //                     break;
    //                 default:
    //                     throw new \Exception('Tipe MIME tidak didukung.');
    //             }

    //             if ($sourceImage !== false) {
    //                 // Simpan sebagai WebP dan hapus file asli
    //                 imagewebp($sourceImage, $webpImagePath);
    //                 imagedestroy($sourceImage);
    //                 @unlink($sourceImagePath);

    //                 // Simpan nama file WebP ke database
    //                 $input['favicon'] = pathinfo($imageName, PATHINFO_FILENAME) . '.webp';
    //             } else {
    //                 throw new \Exception('Gagal membaca favicon asli.');
    //             }
    //         } else {
    //             throw new \Exception('Tipe MIME favicon tidak didukung.');
    //         }
    //     }

    //     if ($image = $request->file('banner')) {
    //         $destinationPath = 'upload/profil/';

    //         // Hapus banner lama jika ada
    //         if ($profil->banner) {
    //             $oldImagePath = public_path($destinationPath . $profil->banner);
    //             if (file_exists($oldImagePath)) {
    //                 @unlink($oldImagePath); // Hapus banner lama
    //             }
    //         }

    //         // Ambil nama file asli dan ekstensinya
    //         $originalFileName = $image->getClientOriginalName();
    //         $imageMimeType = $image->getMimeType();

    //         // Hanya tipe MIME banner yang didukung
    //         if (strpos($imageMimeType, 'image/') === 0) {
    //             // Generate nama file baru
    //             $imageName = date('YmdHis') . '_' . str_replace(' ', '_', $originalFileName);
    //             $image->move($destinationPath, $imageName);

    //             // Path file asli dan WebP
    //             $sourceImagePath = public_path($destinationPath . $imageName);
    //             $webpImagePath = $destinationPath . pathinfo($imageName, PATHINFO_FILENAME) . '.webp';

    //             // Konversi banner ke WebP
    //             switch ($imageMimeType) {
    //                 case 'image/jpeg':
    //                     $sourceImage = @imagecreatefromjpeg($sourceImagePath);
    //                     break;
    //                 case 'image/png':
    //                     $sourceImage = @imagecreatefrompng($sourceImagePath);
    //                     break;
    //                 default:
    //                     throw new \Exception('Tipe MIME tidak didukung.');
    //             }

    //             if ($sourceImage !== false) {
    //                 // Simpan sebagai WebP dan hapus file asli
    //                 imagewebp($sourceImage, $webpImagePath);
    //                 imagedestroy($sourceImage);
    //                 @unlink($sourceImagePath);

    //                 // Simpan nama file WebP ke database
    //                 $input['banner'] = pathinfo($imageName, PATHINFO_FILENAME) . '.webp';
    //             } else {
    //                 throw new \Exception('Gagal membaca banner asli.');
    //             }
    //         } else {
    //             throw new \Exception('Tipe MIME banner tidak didukung.');
    //         }
    //     }

    //     // Update data profil
    //     $profil->update($input);

    //     // Simpan perubahan
    //     $profil->save();

    //     return response()->json(['message' => 'Data profil berhasil diperbarui']);
    // }
}
