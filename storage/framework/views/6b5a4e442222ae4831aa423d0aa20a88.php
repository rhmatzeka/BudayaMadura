

<?php $__env->startSection('title', $halaman->judul . ' - E-Ensiklopedia Etnosains Madura'); ?>

<?php $__env->startSection('content'); ?>
<!-- Breadcrumb -->
<nav aria-label="breadcrumb" class="mb-4">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>" style="color: var(--primary-brown);">Beranda</a></li>
        <li class="breadcrumb-item"><a href="<?php echo e(route('modul.index')); ?>" style="color: var(--primary-brown);">Daftar Isi</a></li>
        <li class="breadcrumb-item active"><?php echo e($halaman->judul); ?></li>
    </ol>
</nav>

<!-- Content based on slug -->
<?php if($halaman->slug == 'sampul-depan'): ?>
    <?php echo $__env->make('modul.pages.sampul-depan', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php elseif($halaman->slug == 'identitas'): ?>
    <?php echo $__env->make('modul.pages.identitas', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php elseif($halaman->slug == 'tujuan'): ?>
    <?php echo $__env->make('modul.pages.tujuan', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php elseif($halaman->slug == 'target-pengguna'): ?>
    <?php echo $__env->make('modul.pages.target-pengguna', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php elseif($halaman->slug == 'keunggulan'): ?>
    <?php echo $__env->make('modul.pages.keunggulan', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php elseif($halaman->slug == 'petunjuk-penggunaan'): ?>
    <?php echo $__env->make('modul.pages.petunjuk-penggunaan', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php elseif($halaman->slug == 'pengenalan-etnosains'): ?>
    <?php echo $__env->make('modul.pages.pengenalan-etnosains', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php elseif($halaman->slug == 'daftar-produk'): ?>
    <?php echo $__env->make('modul.pages.daftar-produk', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>

<!-- Navigation -->
<div class="decorative-line mt-5"></div>

<div class="d-flex justify-content-between align-items-center mt-4">
    <?php if($previous): ?>
        <a href="<?php echo e(route('modul.show', $previous->slug)); ?>" class="btn-vintage-outline">
            <i class="fas fa-arrow-left me-2"></i><?php echo e($previous->judul); ?>

        </a>
    <?php else: ?>
        <div></div>
    <?php endif; ?>

    <a href="<?php echo e(route('modul.index')); ?>" class="btn-vintage">
        <i class="fas fa-list me-2"></i>Daftar Isi
    </a>

    <?php if($next): ?>
        <a href="<?php echo e(route('modul.show', $next->slug)); ?>" class="btn-vintage-outline">
            <?php echo e($next->judul); ?><i class="fas fa-arrow-right ms-2"></i>
        </a>
    <?php else: ?>
        <div></div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\e-ensiklopedia\resources\views/modul/show.blade.php ENDPATH**/ ?>