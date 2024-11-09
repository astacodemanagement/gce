<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

use App\Models\LogHistori;
use App\Models\Chat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index()
    {
        $title = "Halaman Chat";
        $subtitle = "Menu Chat";
    
        // Ambil pesan terakhir dari setiap sender_id dan receiver_id yang unik, hanya untuk sender_type "customer"
        $chat = Chat::with('receiver', 'sender')
            ->select('sender_id', 'receiver_id', 'sender_type', 'is_read', \DB::raw('MAX(created_at) as latest_message_time'))
            ->where('sender_type', 'customer') // Filter hanya untuk sender_type "customer"
            ->groupBy('sender_id', 'receiver_id', 'sender_type', 'is_read')
            ->orderBy('latest_message_time', 'desc')
            ->get();
    
        // Ambil semua pengguna (konsumen)
        $users = User::all();
    
        return view('back.chat.index', compact('chat', 'title', 'subtitle', 'users'));
    }
    



    public function show($id)
    {
        // Mengambil pesan-pesan antara admin dan konsumen
        $messages = Chat::where(function ($query) use ($id) {
            $query->where('sender_id', auth()->id())  // admin sebagai pengirim
                ->where('receiver_id', $id);       // konsumen sebagai penerima
        })
            ->orWhere(function ($query) use ($id) {
                $query->where('sender_id', $id)          // konsumen sebagai pengirim
                    ->where('receiver_id', auth()->id()); // admin sebagai penerima
            })
            ->orderBy('created_at', 'asc')  // Urutkan pesan berdasarkan waktu
            ->get();

        // Mengambil data konsumen berdasarkan ID
        $customer = User::find($id);

        // Menampilkan halaman chat dengan data pesan dan konsumen
        return view('back.chat.chat', compact('messages', 'customer'));
    }


    public function sendMessage(Request $request)
    {
        // Validasi input
        $request->validate([
            'receiver_id' => 'required|exists:users,id',  // Pastikan receiver_id valid
            'message' => 'required|string',  // Pesan tidak boleh kosong
        ]);

        // Simpan pesan baru ke dalam tabel chat
        Chat::create([
            'sender_id' => auth()->id(),        // ID admin yang sedang login
            'receiver_id' => $request->receiver_id,  // ID konsumen yang dipilih
            'message' => $request->message,     // Isi pesan
        ]);

        // Arahkan kembali ke halaman chat dengan konsumen yang dipilih
        return redirect()->route('chat.show', $request->receiver_id);
    }

    public function markAsRead($senderId)
    {
        // Ubah status 'is_read' menjadi 'Sudah Dibaca' untuk semua pesan dari pengirim tersebut
        Chat::where('sender_id', $senderId) // Mengambil semua pesan yang dikirim oleh sender_id
            ->where('receiver_id', auth()->id()) // Pastikan pesan ini diterima oleh admin yang sedang login
            ->where('is_read', 'Belum Dibaca') // Pilih hanya pesan yang belum dibaca
            ->update(['is_read' => 'Sudah Dibaca']); // Update status menjadi 'Sudah Dibaca'
    
        // Kembali ke halaman chat dengan konsumen yang dipilih
        return redirect()->route('chat.show', $senderId);
    }
    
    
    
    



    public function create() {}

    public function store(Request $request) {}



    public function edit($id) {}

    public function update(Request $request, $id) {}


    public function destroy($id)
    {
        // Mencari chat berdasarkan ID
        $chat = Chat::find($id);

        if ($chat) {
            // Menghapus chat
            $chat->delete();

            // Mengirimkan respons sukses dengan pesan
            return response()->json([
                'success' => true,
                'message' => 'Data Berhasil Dihapus'
            ]);
        }

        // Jika chat tidak ditemukan
        return response()->json([
            'success' => false,
            'message' => 'Data tidak ditemukan'
        ]);
    }
}
