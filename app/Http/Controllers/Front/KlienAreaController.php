<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller; // Tambahkan baris ini
use App\Models\Chat;
use App\Models\Informasi;
use App\Models\Konsumen;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KlienAreaController extends Controller
{
    public function index(Request $request)
    {
        $title = "Halaman Klien Area";
        $subtitle = "Menu Klien Area";
        $informasi = Informasi::all();
        $user = Auth::user();
    
        // Mengambil data chat yang relevan antara pengguna dan admin
        $messages = Chat::where(function ($query) use ($user) {
            $query->where('sender_id', $user->id)
                ->orWhere('receiver_id', $user->id);
        })
        ->orderBy('created_at', 'asc')
        ->get();
    
        // Menandai pesan sebagai sudah dibaca jika penerima adalah pengguna
        Chat::where('receiver_id', $user->id)
            ->where('is_read', false) // Hanya ubah jika belum dibaca
            ->update(['is_read' => true]);
    
        $konsumen = Konsumen::where('user_id', $user->id)->first();
        
        // Menentukan admin berdasarkan pesan pertama yang ada
        $admin = null;
        if ($messages->isNotEmpty()) {
            $admin = User::find($messages->first()->sender_id); // Mengambil admin berdasarkan sender_id dari pesan pertama
        }
    
        return view('front.area.index', compact('title', 'subtitle', 'user', 'konsumen', 'messages', 'admin', 'informasi'));
    }
    


    public function sendMessage(Request $request)
    {
        // Validasi input
        $request->validate([
            'receiver_id' => 'required|exists:users,id',  // Pastikan receiver_id valid (admin)
            'message' => 'required|string',  // Pesan tidak boleh kosong
        ]);

        // Simpan pesan baru ke dalam tabel chat
        Chat::create([
            'sender_id' => auth()->id(),            // ID konsumen yang sedang login
            'receiver_id' => $request->receiver_id,  // ID admin yang dipilih
            'sender_type' => 'customer',             // Jenis pengirim (konsumen)
            'is_read' => 'Belum Dibaca',             // Jenis pengirim (konsumen)
            'message' => $request->message,          // Isi pesan
        ]);

        // Arahkan kembali ke halaman chat dengan admin yang dipilih
        return redirect()->route('area.index');
    }




    public function pendaftaran()
    {
        $title = "Halaman Pendaftaran";
        $subtitle = "Menu Pendaftaran";



        return view('front.pendaftaran.index', compact('title', 'subtitle'));
    }
}
