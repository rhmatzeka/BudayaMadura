

<?php $__env->startSection('title', 'Galeri Produk - E-Ensiklopedia Etnosaing Madura'); ?>

<?php $__env->startSection('content'); ?>
<div class="hero">
    <div class="container">
        <h1>Galeri Produk</h1>
        <p>Koleksi foto lengkap produk budaya Madura</p>
    </div>
</div>

<div class="container py-5">
    <div class="row">
        <?php $__empty_1 = true; $__currentLoopData = $produk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <?php $__currentLoopData = $item->gambar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gambar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-3 mb-4">
                <div class="card h-100 overflow-hidden">
                    <img src="<?php echo e(asset('images/produk/' . $gambar->path_gambar)); ?>" 
                         class="card-img-top" alt="<?php echo e($gambar->judul_gambar ?? $item->nama_produk); ?>"
                         style="height: 250px; object-fit: cover; cursor: pointer;"
                         data-bs-toggle="modal" data-bs-target="#imageModal"
                         onclick="setModalImage('<?php echo e(asset('images/produk/' . $gambar->path_gambar)); ?>', '<?php echo e($item->nama_produk); ?>')">
                    <div class="card-body">
                        <h6 class="card-title"><?php echo e($item->nama_produk); ?></h6>
                        <?php if($gambar->deskripsi_gambar): ?>
                            <p class="card-text small text-muted"><?php echo e($gambar->deskripsi_gambar); ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="card-footer bg-white">
                        <a href="<?php echo e(route('produk.show', $item->slug)); ?>" class="btn btn-sm btn-primary">
                            Lihat Produk
                        </a>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="col-12">
                <div class="alert alert-info text-center">
                    <i class="fas fa-info-circle"></i> Tidak ada galeri yang tersedia.
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

<!-- Image Modal -->
<div class="modal fade" id="imageModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">Gambar Produk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center">
                <img id="modalImage" src="" class="img-fluid" alt="Gambar" style="max-height: 500px; object-fit: cover;">
            </div>
        </div>
    </div>
</div>

<?php $__env->startSection('extra-js'); ?>
<script>
function setModalImage(imageSrc, productName) {
    document.getElementById('modalImage').src = imageSrc;
    document.getElementById('modalTitle').textContent = productName;
}
</script>
<?php $__env->stopSection(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\e-ensiklopedia\resources\views/produk/galeri.blade.php ENDPATH**/ ?>