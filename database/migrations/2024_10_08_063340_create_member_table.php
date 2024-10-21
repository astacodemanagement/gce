<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('member', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Foreign key ke tabel users
            $table->enum('kategori_konsumen', ['personal', 'corporate']);
            $table->string('nama_perusahaan')->nullable(); // Bisa null untuk kategori personal
            $table->string('nama_lengkap');
            $table->enum('jenis_kelamin', ['Pria', 'Wanita']);
            $table->date('tanggal_lahir');
            $table->string('no_wa')->nullable();
            $table->string('email')->unique();
            $table->text('alamat')->nullable();
            $table->string('password');
            $table->string('kode_referal')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('member');
    }
};
