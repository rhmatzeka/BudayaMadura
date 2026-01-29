<div class="text-center mb-5">
    <h1 style="font-family: 'Playfair Display', serif; font-size: 2.5rem; color: var(--dark-brown); margin-bottom: 20px;">
        <i class="fas fa-box-open me-2"></i>MARI MENGENAL PRODUK LOKAL MADURA
    </h1>
    <p style="font-size: 1.1rem; color: var(--brown);">
        Pilih produk budaya yang ingin kamu pelajari
    </p>
</div>

<!-- Gambar dan Judul 4 Produk (Bisa di Klik) -->
<div class="row g-4 mb-5">
    <?php
        $produkList = \App\Models\Produk::take(4)->get();
    ?>
    
    <?php $__currentLoopData = $produkList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="col-md-6">
        <a href="<?php echo e(route('produk.show', $produk->slug)); ?>" class="text-decoration-none">
            <div class="product-card">
                <?php if($produk->gambar->count() > 0): ?>
                    <img src="<?php echo e(asset('images/produk/' . $produk->gambar->first()->path_gambar)); ?>" 
                         alt="<?php echo e($produk->nama_produk); ?>">
                <?php else: ?>
                    <div style="height: 250px; background: linear-gradient(135deg, #FFE5B4 0%, #FFD700 100%); display: flex; align-items: center; justify-content: center;">
                        <div class="text-center">
                            <i class="fas fa-image" style="font-size: 4rem; color: var(--brown);"></i>
                            <p style="color: var(--dark-brown); margin-top: 15px; font-weight: 600; font-size: 1.2rem;"><?php echo e($produk->nama_produk); ?></p>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="card-body">
                    <h4 style="color: var(--dark-brown); font-weight: 600; margin-bottom: 15px;"><?php echo e($produk->nama_produk); ?></h4>
                    <p style="color: #666; margin-bottom: 15px;"><?php echo e(Str::limit($produk->deskripsi, 120)); ?></p>
                    <div class="d-flex justify-content-between align-items-center">
                        <span style="background: var(--cream); color: var(--dark-brown); padding: 6px 15px; border-radius: 15px; font-size: 0.85rem; font-weight: 500;">
                            <?php echo e($produk->kategori); ?>

                        </span>
                        <span style="color: var(--brown); font-weight: 600;">
                            Klik untuk belajar <i class="fas fa-arrow-right ms-1"></i>
                        </span>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<!-- Navigasi Interaktif: Tombol Masing-masing Produk -->
<div style="background: linear-gradient(135deg, #E8F4F8 0%, #D4E8F0 100%); padding: 40px; border-radius: 20px; margin-top: 40px;">
    <h3 style="text-align: center; color: var(--dark-brown); margin-bottom: 30px;">
        <i class="fas fa-hand-pointer me-2"></i>Navigasi Interaktif
    </h3>
    <p style="text-align: center; color: #666; margin-bottom: 30px;">
        Klik tombol di bawah untuk langsung ke halaman produk yang ingin dipelajari
    </p>
    
    <div class="row g-3">
        <?php $__currentLoopData = $produkList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-3 col-6">
            <a href="<?php echo e(route('produk.show', $produk->slug)); ?>" class="btn btn-primary-custom w-100" style="padding: 15px;">
                <i class="fas fa-arrow-circle-right me-2"></i><?php echo e($produk->nama_produk); ?>

            </a>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>

<div style="margin-top: 40px; padding: 30px; background: linear-gradient(135deg, #FFF8E7 0%, #F5E6D3 100%); border-radius: 15px; border-left: 5px solid var(--brown);">
    <h4 style="color: var(--dark-brown); margin-bottom: 15px;">
        <i class="fas fa-info-circle me-2"></i>Petunjuk Belajar
    </h4>
    <ul style="color: #666; line-height: 2;">
        <li>Klik pada <strong>gambar produk</strong> atau <strong>tombol navigasi</strong> untuk memulai pembelajaran</li>
        <li>Setiap produk memiliki halaman khusus dengan penjelasan lengkap</li>
        <li>Pelajari tentang <strong>identitas, bahan baku, proses pembuatan, konsep IPAS</strong>, dan <strong>nilai budaya</strong></li>
        <li>Gunakan tombol <strong>Kembali</strong> dan <strong>Lanjut</strong> untuk navigasi antar halaman</li>
    </ul>
</div><?php /**PATH C:\laragon\www\e-ensiklopedia\resources\views/modul/pages/daftar-produk.blade.php ENDPATH**/ ?>