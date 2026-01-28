<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produk extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'produk';
    protected $fillable = [
        'nama_produk',
        'slug',
        'deskripsi',
        'manfaat_budaya',
        'proses_produksi',
        'lokasi_pembuatan',
        'nama_pembuat',
        'harga',
        'kategori',
    ];

    /**
     * Get all of the gambar for the Produk
     */
    public function gambar()
    {
        return $this->hasMany(Gambar::class, 'produk_id');
    }

    /**
     * Get all of the video for the Produk
     */
    public function video()
    {
        return $this->hasMany(Video::class, 'produk_id');
    }

    /**
     * Get all of the nilai budaya for the Produk
     */
    public function nilaiBudaya()
    {
        return $this->belongsToMany(NilaiBudaya::class, 'produk_nilai_budaya', 'produk_id', 'nilai_budaya_id');
    }

    /**
     * Get the route key for the model.
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
