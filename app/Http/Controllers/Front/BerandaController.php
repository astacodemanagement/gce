<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller; // Tambahkan baris ini
use App\Models\Alasan;
use App\Models\Berita;
use App\Models\Dokumentasi;
use App\Models\Faq;
use App\Models\KategoriBerita;
use App\Models\Konsumen;
use App\Models\Layanan;
use App\Models\Member;
use App\Models\Mitra;
use App\Models\Profil;
use App\Models\Slider;
use App\Models\Tahap;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class BerandaController extends Controller
{
    public function index(Request $request)
    {
        $title = "Halaman Beranda";
        $subtitle = "Menu Beranda";
        $slider = Slider::orderBy('urutan', 'asc')->get();
        $layanan = Layanan::orderBy('urutan', 'asc')->get();
        $tahap = Tahap::orderBy('urutan', 'asc')->get();
        $mitra = Mitra::orderBy('urutan', 'asc')->get();
        $alasan = Alasan::orderBy('urutan', 'asc')->get();
        $faq = Faq::orderBy('urutan', 'asc')->get();
        $kategoriBerita = KategoriBerita::all();
        $berita = Berita::orderBy('id', 'desc')->paginate(4)->withQueryString();
        $berita2 = Berita::orderBy('id', 'desc')->take(2)->get();




        return view('front.beranda', compact('title', 'subtitle', 'slider', 'layanan', 'mitra', 'berita', 'berita2', 'faq',  'tahap', 'alasan', 'kategoriBerita'));
    }

    public function halaman_berita()
    {
        $title = "Halaman Berita";
        $subtitle = "Menu Berita";



        return view('front.pendaftaran.index', compact('title', 'subtitle'));
    }

    public function pendaftaran()
    {
        $title = "Halaman Pendaftaran";
        $subtitle = "Menu Pendaftaran";



        return view('front.pendaftaran.index', compact('title', 'subtitle'));
    }

    public function login_pengguna()
    {
        $title = "Halaman Login";
        $subtitle = "Menu Login";



        return view('front.login.index', compact('title', 'subtitle'));
    }

    public function dokumentasi_umum()
    {
        $title = "Halaman Dokumentasi";
        $subtitle = "Menu Dokumentasi";
        $dokumentasi = Dokumentasi::orderBy('urutan', 'asc')->get();

        return view('front.dokumentasi.index', compact('title', 'subtitle', 'dokumentasi'));
    }

    




    public function create() {}


    public function edit($id) {}

    public function update(Request $request, $id) {}

    public function destroy($id) {}
}
