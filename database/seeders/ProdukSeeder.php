<?php

namespace Database\Seeders;

use App\Models\Produk;
use App\Models\Gambar;
use App\Models\Video;
use App\Models\NilaiBudaya;
use Illuminate\Database\Seeder;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buat Nilai Budaya terlebih dahulu
        $nilai1 = NilaiBudaya::create([
            'nama_nilai' => 'Kebijaksanaan Lokal',
            'deskripsi_nilai' => 'Pengetahuan tradisional yang telah teruji dalam kehidupan sehari-hari masyarakat Madura.',
            'kategori' => 'Filosofi',
        ]);

        $nilai2 = NilaiBudaya::create([
            'nama_nilai' => 'Kebersamaan',
            'deskripsi_nilai' => 'Semangat gotong royong dan saling membantu antar sesama masyarakat.',
            'kategori' => 'Sosial',
        ]);

        // Produk 1: Petis Madura
        $produk1 = Produk::create([
            'nama_produk' => 'Petis Madura',
            'slug' => 'petis-madura',
            'deskripsi' => 'Petis adalah pasta atau saus kental yang terbuat dari ikan teri dan garam yang difermentasi selama beberapa bulan. Produk ini adalah salah satu makanan tradisional yang paling terkenal dari Madura dengan cita rasa yang unik dan gurih.',
            'manfaat_budaya' => 'Petis Madura melambangkan kearifan lokal dalam mengolah hasil laut menjadi produk bernilai tinggi. Proses pembuatannya yang tradisional telah diwariskan turun-temurun selama berabad-abad.',
            'proses_produksi' => 'Ikan teri segar dikumpulkan, dicuci, dan dicampur dengan garam dalam perbandingan tertentu. Kemudian difermentasi dalam wadah selama 3-6 bulan sambil sesekali diaduk. Hasil fermentasi kemudian diperas dan diambil sarinya saja.',
            'lokasi_pembuatan' => 'Kabupaten Sumenep, Madura',
            'nama_pembuat' => 'Pengrajin Tradisional Madura',
            'harga' => 35000,
            'kategori' => 'Makanan',
        ]);

        // Tambahkan gambar untuk Petis
        Gambar::create([
            'produk_id' => $produk1->id,
            'judul_gambar' => 'Petis Madura Tradisional',
            'path_gambar' => 'petis-1.jpg',
            'deskripsi_gambar' => 'Petis dalam kemasan botol kaca tradisional',
            'urutan' => 1,
        ]);

        Gambar::create([
            'produk_id' => $produk1->id,
            'judul_gambar' => 'Proses Pembuatan Petis',
            'path_gambar' => 'petis-2.jpg',
            'deskripsi_gambar' => 'Proses fermentasi ikan teri dengan garam',
            'urutan' => 2,
        ]);

        // Tambahkan video untuk Petis
        Video::create([
            'produk_id' => $produk1->id,
            'judul_video' => 'Cara Membuat Petis Madura',
            'deskripsi_video' => 'Tutorial lengkap cara membuat petis Madura yang autentik',
            'link_youtube' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
            'durasi_menit' => 15,
        ]);

        // Relasi dengan Nilai Budaya
        $produk1->nilaiBudaya()->attach([$nilai1->id, $nilai2->id]);

        // Produk 2: Tambal Garam
        $produk2 = Produk::create([
            'nama_produk' => 'Tambal Garam',
            'slug' => 'tambal-garam',
            'deskripsi' => 'Tambal Garam adalah penganan tradisional Madura yang terbuat dari tepung terigu, telur, dan gula. Makanan ini memiliki tekstur yang renyah dan manis, sering dijadikan sebagai oleh-oleh khas Madura.',
            'manfaat_budaya' => 'Tambal Garam adalah warisan budaya kuliner yang mencerminkan kreativitas dan keahlian masyarakat Madura dalam mengolah bahan sederhana menjadi makanan yang lezat dan bernilai ekonomis tinggi.',
            'proses_produksi' => 'Campurkan tepung terigu, telur, dan gula, kemudian aduk hingga merata. Bentuk kecil-kecil seperti kue kering. Goreng dalam minyak panas hingga berwarna kuning keemasan. Tiriskan dan angin-anginkan.',
            'lokasi_pembuatan' => 'Pulau Madura, Jawa Timur',
            'harga' => 25000,
            'kategori' => 'Makanan',
        ]);

        Gambar::create([
            'produk_id' => $produk2->id,
            'judul_gambar' => 'Tambal Garam Renyah',
            'path_gambar' => 'tambal-garam-1.jpg',
            'deskripsi_gambar' => 'Tambal Garam siap makan yang renyah',
            'urutan' => 1,
        ]);

        $produk2->nilaiBudaya()->attach([$nilai2->id]);

        // Produk 3: Renginang Kelor
        $produk3 = Produk::create([
            'nama_produk' => 'Renginang Kelor',
            'slug' => 'renginang-kelor',
            'deskripsi' => 'Renginang adalah makanan kering yang terbuat dari beras yang digoreng dan dicampur dengan kelapa parut, gula, dan garam. Variasi Renginang Kelor menggunakan daun kelor yang memberikan warna hijau dan aroma khas.',
            'manfaat_budaya' => 'Renginang Kelor menggabungkan kearifan lokal dalam memanfaatkan tanaman kelor yang kaya nutrisi dengan teknik penggorengan tradisional Madura.',
            'proses_produksi' => 'Beras yang sudah dimasak setengah jadi digoreng dengan minyak, kemudian dicampur dengan kelapa parut, gula, dan daun kelor yang sudah disangrai. Diaduk merata hingga tercampur sempurna.',
            'lokasi_pembuatan' => 'Kabupaten Bangkalan, Madura',
            'harga' => 30000,
            'kategori' => 'Makanan',
        ]);

        Gambar::create([
            'produk_id' => $produk3->id,
            'judul_gambar' => 'Renginang Kelor Hijau',
            'path_gambar' => 'renginang-1.jpg',
            'deskripsi_gambar' => 'Renginang dengan warna hijau dari daun kelor',
            'urutan' => 1,
        ]);

        $produk3->nilaiBudaya()->attach([$nilai1->id]);

        // Produk 4: Batik Madura
        $produk4 = Produk::create([
            'nama_produk' => 'Batik Madura',
            'slug' => 'batik-madura',
            'deskripsi' => 'Batik Madura adalah karya seni tekstil tradisional dengan pola-pola khas yang menggunakan teknik pembatikan malam (lilin) pada kain. Batik Madura terkenal dengan motif yang tegas dan warna-warna yang cerah.',
            'manfaat_budaya' => 'Batik Madura merupakan ekspresi seni tradisional yang mencerminkan keindahan alam dan filosofi hidup masyarakat Madura. Setiap motif memiliki makna dan cerita tersendiri.',
            'proses_produksi' => 'Kain dipanaskan, kemudian lilin diaplikasikan menggunakan canting atau cap untuk membuat pola. Kain dicelup ke dalam pewarna alam atau kimia. Proses ini diulang untuk setiap warna yang diinginkan.',
            'lokasi_pembuatan' => 'Kabupaten Sumenep, Madura',
            'nama_pembuat' => 'Pengrajin Batik Tradisional',
            'harga' => 150000,
            'kategori' => 'Tekstil',
        ]);

        Gambar::create([
            'produk_id' => $produk4->id,
            'judul_gambar' => 'Motif Batik Sumenep',
            'path_gambar' => 'batik-1.jpg',
            'deskripsi_gambar' => 'Batik dengan motif tradisional Sumenep',
            'urutan' => 1,
        ]);

        $produk4->nilaiBudaya()->attach([$nilai1->id, $nilai2->id]);
    }
}
