<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller; // Tambahkan baris ini
 
use Illuminate\Http\Request;
 

class KlienAreaController extends Controller
{
    public function index(Request $request)
    {
        $title = "Halaman Klien Area";
        $subtitle = "Menu Klien Area";

        return view('front.area.index', compact('title', 'subtitle'));
    }
 

    public function pendaftaran()
    {
        $title = "Halaman Pendaftaran";
        $subtitle = "Menu Pendaftaran";



        return view('front.pendaftaran.index', compact('title', 'subtitle'));
    }
 
}
