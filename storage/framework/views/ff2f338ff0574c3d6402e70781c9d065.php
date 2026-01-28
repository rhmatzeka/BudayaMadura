

<?php $__env->startSection('title', 'Daftar Isi - E-Ensiklopedia Etnosains Madura'); ?>

<?php $__env->startSection('content'); ?>
<div class="text-center mb-5">
    <h1 class="section-title-vintage">
        <i class="fas fa-list-ul me-2"></i>DAFTAR ISI
    </h1>
    <p class="lead" style="color: var(--primary-brown);">
        E-Ensiklopedia Etnosains Madura
    </p>
</div>

<div class="row">
    <?php $__currentLoopData = $halaman; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="col-md-6 mb-4">
        <a href="<?php echo e(route('modul.show', $item->slug)); ?>" class="text-decoration-none">
            <div class="card-vintage" style="cursor: pointer;">
                <div class="d-flex align-items-center">
                    <div style="width: 80px; height: 80px; background: linear-gradient(135deg, var(--primary-brown), var(--secondary-brown)); border-radius: 10px; display: flex; align-items: center; justify-content: center; margin-right: 20px;">
                        <i class="fas <?php echo e($item->icon); ?> fa-2x text-white"></i>
                    </div>
                    <div class="flex-grow-1">
                        <h5 style="color: var(--primary-brown); margin-bottom: 5px;">
                            <?php echo e($index + 1); ?>. <?php echo e($item->judul); ?>

                        </h5>
                        <p class="small text-muted mb-0"><?php echo e($item->konten); ?></p>
                    </div>
                    <div>
                        <i class="fas fa-chevron-right" style="color: var(--secondary-brown);"></i>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<div class="decorative-line mt-5"></div>

<div class="text-center mt-4">
    <a href="<?php echo e(route('home')); ?>" class="btn-vintage">
        <i class="fas fa-home me-2"></i>Kembali ke Beranda
    </a>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\e-ensiklopedia\resources\views/modul/index.blade.php ENDPATH**/ ?>