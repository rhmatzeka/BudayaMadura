

<?php $__env->startSection('title', 'Glosarium - E-Ensiklopedia Etnosaing Madura'); ?>

<?php $__env->startSection('content'); ?>
<div class="hero">
    <div class="container">
        <h1>Glosarium Budaya</h1>
        <p>Kamus istilah dan arti-arti penting dalam budaya Madura</p>
    </div>
</div>

<div class="container py-5">
    <!-- Search Section -->
    <div class="search-box">
        <form action="<?php echo e(route('glossarium.search')); ?>" method="GET">
            <div class="row">
                <div class="col-md-8">
                    <input type="text" name="q" class="form-control form-control-lg" placeholder="Cari istilah atau arti..." value="<?php echo e(request('q')); ?>">
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary btn-lg w-100">
                        <i class="fas fa-search"></i> Cari
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- Filter Kategori -->
    <div class="mb-4">
        <h6>Filter Kategori:</h6>
        <div class="btn-group flex-wrap" role="group">
            <a href="<?php echo e(route('glossarium.index')); ?>" class="btn btn-outline-primary <?php echo e(!request('kategori') ? 'active' : ''); ?>">
                Semua
            </a>
            <a href="<?php echo e(route('glossarium.kategori', 'Bahasa Madura')); ?>" class="btn btn-outline-primary <?php echo e(request('kategori') == 'Bahasa Madura' ? 'active' : ''); ?>">
                Bahasa Madura
            </a>
            <a href="<?php echo e(route('glossarium.kategori', 'Budaya')); ?>" class="btn btn-outline-primary <?php echo e(request('kategori') == 'Budaya' ? 'active' : ''); ?>">
                Budaya
            </a>
            <a href="<?php echo e(route('glossarium.kategori', 'Sejarah')); ?>" class="btn btn-outline-primary <?php echo e(request('kategori') == 'Sejarah' ? 'active' : ''); ?>">
                Sejarah
            </a>
            <a href="<?php echo e(route('glossarium.kategori', 'Tradisi')); ?>" class="btn btn-outline-primary <?php echo e(request('kategori') == 'Tradisi' ? 'active' : ''); ?>">
                Tradisi
            </a>
        </div>
    </div>

    <!-- Glossarium List -->
    <div class="row">
        <div class="col-lg-8">
            <?php $__empty_1 = true; $__currentLoopData = $glossarium; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="glossarium-item">
                <div class="d-flex justify-content-between align-items-start mb-2">
                    <strong><?php echo e($item->istilah); ?></strong>
                    <?php if($item->kategori): ?>
                        <span class="badge badge-kategori"><?php echo e($item->kategori); ?></span>
                    <?php endif; ?>
                </div>
                <p class="mb-2"><strong class="text-muted">Arti:</strong> <?php echo e($item->arti_istilah); ?></p>
                <?php if($item->penjelasan_lengkap): ?>
                    <p class="mb-0"><strong class="text-muted">Penjelasan:</strong> <?php echo e($item->penjelasan_lengkap); ?></p>
                <?php endif; ?>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="alert alert-info">
                    <i class="fas fa-info-circle"></i> Tidak ada istilah yang ditemukan.
                </div>
            <?php endif; ?>

            <!-- Pagination -->
            <div class="mt-4">
                <?php echo e($glossarium->links('pagination::bootstrap-5')); ?>

            </div>
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0">Info Glosarium</h5>
                </div>
                <div class="card-body">
                    <p>Glosarium ini berisi kumpulan istilah dan arti-arti penting dalam budaya Madura yang dapat membantu Anda memahami lebih dalam tentang warisan budaya nusantara.</p>
                    <hr>
                    <p><strong>Total Istilah:</strong> <?php echo e(\App\Models\Glossarium::count()); ?></p>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Kategori Populer</h5>
                </div>
                <div class="card-body">
                    <div class="list-group">
                        <a href="<?php echo e(route('glossarium.kategori', 'Bahasa Madura')); ?>" class="list-group-item list-group-item-action">
                            <i class="fas fa-language"></i> Bahasa Madura
                            <span class="badge bg-primary float-end"><?php echo e(\App\Models\Glossarium::where('kategori', 'Bahasa Madura')->count()); ?></span>
                        </a>
                        <a href="<?php echo e(route('glossarium.kategori', 'Budaya')); ?>" class="list-group-item list-group-item-action">
                            <i class="fas fa-masks-theater"></i> Budaya
                            <span class="badge bg-primary float-end"><?php echo e(\App\Models\Glossarium::where('kategori', 'Budaya')->count()); ?></span>
                        </a>
                        <a href="<?php echo e(route('glossarium.kategori', 'Sejarah')); ?>" class="list-group-item list-group-item-action">
                            <i class="fas fa-landmark"></i> Sejarah
                            <span class="badge bg-primary float-end"><?php echo e(\App\Models\Glossarium::where('kategori', 'Sejarah')->count()); ?></span>
                        </a>
                        <a href="<?php echo e(route('glossarium.kategori', 'Tradisi')); ?>" class="list-group-item list-group-item-action">
                            <i class="fas fa-scroll"></i> Tradisi
                            <span class="badge bg-primary float-end"><?php echo e(\App\Models\Glossarium::where('kategori', 'Tradisi')->count()); ?></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\e-ensiklopedia\resources\views/glossarium/index.blade.php ENDPATH**/ ?>