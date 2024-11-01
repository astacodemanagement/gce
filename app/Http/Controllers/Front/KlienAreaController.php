<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller; // Tambahkan baris ini
use App\Models\Konsumen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KlienAreaController extends Controller
{
    public function index(Request $request)
    {
        $title = "Halaman Klien Area";
        $subtitle = "Menu Klien Area";

        $user = Auth::user();

        $konsumen = Konsumen::where('user_id', $user->id)->first();

        return view('front.area.index', compact('title', 'subtitle', 'user', 'konsumen'));
    }
 

    public function pendaftaran()
    {
        $title = "Halaman Pendaftaran";
        $subtitle = "Menu Pendaftaran";



        return view('front.pendaftaran.index', compact('title', 'subtitle'));
    }
 
}
