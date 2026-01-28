<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Glossarium extends Model
{
    use HasFactory;

    protected $table = 'glossarium';
    protected $fillable = [
        'istilah',
        'arti_istilah',
        'penjelasan_lengkap',
        'kategori',
    ];
}
