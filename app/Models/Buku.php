<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;
    protected $table = "buku";
    protected $primarykey = "id";
    protected $fillable = [
        'user_id', 'title', 'penulis', 'penerbit', 'kategori_id', 'cover'
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function pinjam()
    {
        return $this->hasMany(Pinjam::class);
    }
}