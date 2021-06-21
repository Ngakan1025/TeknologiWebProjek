<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pinjam extends Model
{
    use HasFactory;
    protected $table = "pinjam";
    protected $primarykey = "id";
    protected $fillable = [
        'nama', 'alamat', 'telephone', 'tanggal', 'buku_id'
    ];

    public function buku()
    {
        return $this->belongsTo(Buku::class);
    }
}