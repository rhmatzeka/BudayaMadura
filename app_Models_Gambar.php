<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gambar extends Model
{
    use HasFactory;

    protected $table = 'gambar';
    protected $fillable = [
        'produk_id',
        'judul_gambar',
        'path_gambar',
        'deskripsi_gambar',
        'urutan',
    ];

    /**
     * Get the produk that owns the Gambar
     */
    public function produk()
    {
        return $this->belongsTo(Produk::class, 'produk_id');
    }
}
