<?php

namespace Database\Seeders;

use App\Models\Glossarium;
use Illuminate\Database\Seeder;

class GlosariumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $glosarium = [
            [
                'istilah' => 'Petis',
                'arti_istilah' => 'Pasta atau saus kental dari fermentasi ikan teri',
                'penjelasan_lengkap' => 'Petis adalah produk fermentasi ikan teri yang dicampur dengan garam. Memiliki cita rasa yang gurih dan umami, sering digunakan sebagai bumbu masakan atau dimakan langsung dengan nasi.',
                'kategori' => 'Makanan',
            ],
            [
                'istilah' => 'Renginang',
                'arti_istilah' => 'Makanan kering dari beras yang digoreng',
                'penjelasan_lengkap' => 'Renginang adalah makanan ringan tradisional yang terbuat dari beras setengah matang yang digoreng, kemudian dicampur dengan kelapa parut, gula, dan bumbu lainnya.',
                'kategori' => 'Makanan',
            ],
            [
                'istilah' => 'Tambal',
                'arti_istilah' => 'Menjahit atau menambal',
                'penjelasan_lengkap' => 'Dalam bahasa Madura, tambal berarti menjahit atau menambal. Dalam konteks kuliner, Tambal Garam merujuk pada makanan yang dibuat dari adonan sederhana yang "dijahit" menjadi bentuk kecil-kecil.',
                'kategori' => 'Bahasa Madura',
            ],
            [
                'istilah' => 'Batik',
                'arti_istilah' => 'Seni membuat pola pada kain menggunakan lilin',
                'penjelasan_lengkap' => 'Batik adalah teknik menulis atau menggambar pada kain dengan menggunakan lilin yang kemudian dicelup ke dalam pewarna. Batik Madura terkenal dengan motif yang tegas dan warna yang cerah.',
                'kategori' => 'Seni',
            ],
            [
                'istilah' => 'Gotong Royong',
                'arti_istilah' => 'Bekerja sama secara sukarela untuk mencapai tujuan bersama',
                'penjelasan_lengkap' => 'Gotong royong adalah semangat saling membantu dan bekerja sama antar masyarakat tanpa mengharapkan imbalan. Ini adalah nilai sosial penting dalam budaya Indonesia termasuk Madura.',
                'kategori' => 'Budaya',
            ],
            [
                'istilah' => 'Karapan Sapi',
                'arti_istilah' => 'Perlombaan sapi yang ditarik oleh dua orang',
                'penjelasan_lengkap' => 'Karapan Sapi adalah tradisi unik dari Madura berupa perlombaan kecepatan sapi yang ditarik oleh dua orang joki. Acara ini biasanya diadakan setelah musim panen padi sebagai bentuk syukuran.',
                'kategori' => 'Tradisi',
            ],
            [
                'istilah' => 'Kearifan Lokal',
                'arti_istilah' => 'Nilai-nilai dan pengetahuan tradisional yang dipegang teguh masyarakat lokal',
                'penjelasan_lengkap' => 'Kearifan lokal adalah hasil dari pengalaman dan pembelajaran turun-temurun yang telah terbukti cocok dengan kehidupan masyarakat setempat dan lingkungannya.',
                'kategori' => 'Budaya',
            ],
            [
                'istilah' => 'Canting',
                'arti_istilah' => 'Alat untuk menggambar lilin pada kain batik',
                'penjelasan_lengkap' => 'Canting adalah alat tradisional berupa batang tembaga yang dilengkapi dengan wadah tempat lilin. Digunakan untuk menggambar pola halus dan detail pada kain batik.',
                'kategori' => 'Seni',
            ],
        ];

        foreach ($glosarium as $item) {
            Glossarium::create($item);
        }
    }
}
