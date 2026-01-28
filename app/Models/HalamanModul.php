<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HalamanModul extends Model
{
    protected $table = 'halaman_modul';
    
    protected $fillable = [
        'judul',
        'slug',
        'konten',
        'urutan',
        'icon'
    ];
}