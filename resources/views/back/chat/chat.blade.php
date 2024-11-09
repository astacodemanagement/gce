@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-body">
        <!-- Tombol Back ke halaman chat.index -->
        <a href="{{ route('chat.index') }}" class="btn btn-secondary mb-3">
            <i class="fas fa-arrow-left"></i> Kembali Ke Data Chat
        </a>

        <h3>Chat dengan {{ $customer->name }}</h3>

        <!-- Menampilkan pesan chat -->
        <div class="chat-container mb-3">
            @foreach ($messages as $message)
            <div class="chat-message {{ $message->sender_id === auth()->id() ? 'sender' : 'receiver' }}">
                <p>{{ $message->message }}</p>
                <span class="chat-time">{{ $message->created_at->format('H:i') }}</span>
            </div>
            @endforeach
        </div>

        <!-- Tombol untuk menandai percakapan sebagai sudah dibaca -->
        @if ($messages->where('is_read', 'Belum Dibaca')->count() > 0)
        <!-- Tombol untuk memberi tanda sudah dibaca -->
        <form action="{{ route('chat.markAsRead', $customer->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('PATCH')
            <button type="submit" class="btn btn-sm btn-success">
                <i class="fas fa-check"></i> Tandai Sudah Dibaca
            </button>
        </form>

        @endif
        <br><br>

        <!-- Form untuk mengirim pesan baru -->
        <form action="{{ route('chat.send') }}" method="POST">
            @csrf
            <input type="hidden" name="receiver_id" value="{{ $customer->id }}">
            <div class="input-group">
                <textarea name="message" class="form-control" placeholder="Ketik pesan Anda di sini"></textarea>
                <button type="submit" class="btn btn-primary">Kirim</button>
            </div>
        </form>
    </div>
</div>
@endsection