<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konsumen extends Model
{
    use HasFactory;

    protected $table = 'konsumen';
    protected $guarded = [];

    public function cabang()
    {
        return $this->belongsTo(Cabang::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}