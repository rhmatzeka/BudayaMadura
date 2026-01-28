

<?php $__env->startSection('title', 'Daftar Produk - E-Ensiklopedia Etnosaing Madura'); ?>

<?php $__env->startSection('content'); ?>
<div class="hero">
    <div class="container">
        <h1>Produk Budaya Madura</h1>
        <p>Jelajahi koleksi lengkap produk dan kerajinan tradisional Madura</p>
    </div>
</div>

<div class="container py-5">
    <!-- Search Section -->
    <div class="search-box">
        <form action="<?php echo e(route('produk.search')); ?>" method="GET">
            <div class="row">
                <div class="col-md-8">
                    <input type="text" name="q" class="form-control" placeholder="Cari produk..." value="<?php echo e(request('q')); ?>">
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="fas fa-search"></i> Cari
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- Filter Kategori -->
    <div class="mb-4">
        <div class="btn-group" role="group">
            <a href="<?php echo e(route('produk.index')); ?>" class="btn btn-outline-primary <?php echo e(!request('kategori') ? 'active' : ''); ?>">
                Semua
            </a>
            <a href="<?php echo e(route('produk.kategori', 'Makanan')); ?>" class="btn btn-outline-primary <?php echo e(request('kategori') == 'Makanan' ? 'active' : ''); ?>">
                Makanan
            </a>
            <a href="<?php echo e(route('produk.kategori', 'Kerajinan')); ?>" class="btn btn-outline-primary <?php echo e(request('kategori') == 'Kerajinan' ? 'active' : ''); ?>">
                Kerajinan
            </a>
            <a href="<?php echo e(route('produk.kategori', 'Tekstil')); ?>" class="btn btn-outline-primary <?php echo e(request('kategori') == 'Tekstil' ? 'active' : ''); ?>">
                Tekstil
            </a>
        </div>
    </div>

    <!-- Produk Grid -->
    <div class="row">
        <?php $__empty_1 = true; $__currentLoopData = $produk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <?php if($item->gambar->count() > 0): ?>
                        <img src="<?php echo e(asset('images/produk/' . $item->gambar->first()->path_gambar)); ?>" 
                             alt="<?php echo e($item->nama_produk); ?>" class="card-img-top produk-image">
                    <?php else: ?>
                        <div class="produk-image bg-secondary d-flex align-items-center justify-content-center">
                            <i class="fas fa-image text-white" style="font-size: 3rem;"></i>
                        </div>
                    <?php endif; ?>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo e($item->nama_produk); ?></h5>
                        <p class="card-text text-muted"><?php echo e(Str::limit($item->deskripsi, 100)); ?></p>
                        <div class="mb-3">
                            <span class="badge badge-kategori"><?php echo e($item->kategori); ?></span>
                            <?php if($item->lokasi_pembuatan): ?>
                                <span class="badge bg-info"><?php echo e($item->lokasi_pembuatan); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="card-footer bg-white border-top-0">
                        <a href="<?php echo e(route('produk.show', $item->slug)); ?>" class="btn btn-primary btn-sm w-100">
                            <i class="fas fa-arrow-right"></i> Lihat Detail
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="col-12">
                <div class="alert alert-info text-center">
                    <i class="fas fa-info-circle"></i> Tidak ada produk yang ditemukan.
                </div>
            </div>
        <?php endif; ?>
    </div>

    <!-- Pagination -->
    <div class="mt-5">
        <?php echo e($produk->links('pagination::bootstrap-5')); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\e-ensiklopedia\resources\views/produk/index.blade.php ENDPATH**/ ?>