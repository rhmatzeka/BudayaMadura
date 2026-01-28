<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiBudaya extends Model
{
    use HasFactory;

    protected $table = 'nilai_budaya';
    protected $fillable = [
        'nama_nilai',
        'deskripsi_nilai',
        'kategori',
    ];

    /**
     * Get all of the produk for the NilaiBudaya
     */
    public function produk()
    {
        return $this->belongsToMany(Produk::class, 'produk_nilai_budaya', 'nilai_budaya_id', 'produk_id');
    }
}
