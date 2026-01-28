<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HalamanModulSeeder extends Seeder
{
    public function run()
    {
        $halaman = [
            [
                'judul' => 'Sampul Depan',
                'slug' => 'sampul-depan',
                'konten' => 'Halaman sampul dengan ilustrasi 4 produk Madura',
                'urutan' => 1,
                'icon' => 'fa-home',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'judul' => 'Identitas',
                'slug' => 'identitas',
                'konten' => 'Informasi identitas e-ensiklopedia',
                'urutan' => 2,
                'icon' => 'fa-id-card',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'judul' => 'Tujuan E-Ensiklopedia',
                'slug' => 'tujuan',
                'konten' => 'Tujuan pembelajaran e-ensiklopedia',
                'urutan' => 3,
                'icon' => 'fa-bullseye',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'judul' => 'Target Pengguna',
                'slug' => 'target-pengguna',
                'konten' => 'Sasaran pengguna e-ensiklopedia',
                'urutan' => 4,
                'icon' => 'fa-users',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'judul' => 'Keunggulan E-Ensiklopedia',
                'slug' => 'keunggulan',
                'konten' => 'Keunggulan dan fitur e-ensiklopedia',
                'urutan' => 5,
                'icon' => 'fa-star',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'judul' => 'Petunjuk Penggunaan',
                'slug' => 'petunjuk-penggunaan',
                'konten' => 'Cara menggunakan e-ensiklopedia',
                'urutan' => 6,
                'icon' => 'fa-book-reader',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'judul' => 'Pengenalan Etnosains',
                'slug' => 'pengenalan-etnosains',
                'konten' => 'Penjelasan tentang etnosains',
                'urutan' => 7,
                'icon' => 'fa-flask',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'judul' => 'Daftar Produk',
                'slug' => 'daftar-produk',
                'konten' => 'Mari Mengenal Produk Lokal Madura',
                'urutan' => 8,
                'icon' => 'fa-list',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];

        DB::table('halaman_modul')->insert($halaman);
    }
}