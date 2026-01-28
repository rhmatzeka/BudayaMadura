

<?php $__env->startSection('title', $produk->nama_produk . ' - E-Ensiklopedia Etnosaing Madura'); ?>

<?php $__env->startSection('content'); ?>
<div class="container py-5">
    <div class="row">
        <!-- Main Content -->
        <div class="col-lg-8">
            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb" class="mb-4">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo e(route('produk.index')); ?>">Produk</a></li>
                    <li class="breadcrumb-item active"><?php echo e($produk->nama_produk); ?></li>
                </ol>
            </nav>

            <!-- Title -->
            <h1 class="mb-3"><?php echo e($produk->nama_produk); ?></h1>
            <div class="mb-4">
                <span class="badge badge-kategori"><?php echo e($produk->kategori); ?></span>
                <?php if($produk->lokasi_pembuatan): ?>
                    <span class="badge bg-info"><i class="fas fa-map-marker-alt"></i> <?php echo e($produk->lokasi_pembuatan); ?></span>
                <?php endif; ?>
                <?php if($produk->nama_pembuat): ?>
                    <span class="badge bg-warning"><i class="fas fa-user"></i> <?php echo e($produk->nama_pembuat); ?></span>
                <?php endif; ?>
            </div>

            <!-- Gallery -->
            <?php if($produk->gambar->count() > 0): ?>
            <div class="mb-5">
                <h3 class="mb-3">Galeri Foto</h3>
                <div id="produkCarousel" class="carousel slide mb-4" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <?php $__currentLoopData = $produk->gambar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $gambar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="carousel-item <?php echo e($index == 0 ? 'active' : ''); ?>">
                            <img src="<?php echo e(asset('images/produk/' . $gambar->path_gambar)); ?>" 
                                 class="d-block w-100" alt="<?php echo e($gambar->judul_gambar ?? $produk->nama_produk); ?>" 
                                 style="height: 400px; object-fit: cover;">
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <?php if($produk->gambar->count() > 1): ?>
                    <button class="carousel-control-prev" type="button" data-bs-target="#produkCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#produkCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </button>
                    <?php endif; ?>
                </div>
                <div class="row">
                    <?php $__currentLoopData = $produk->gambar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gambar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-3 mb-2">
                        <img src="<?php echo e(asset('images/produk/' . $gambar->path_gambar)); ?>" 
                             class="img-thumbnail" alt="<?php echo e($gambar->judul_gambar ?? $produk->nama_produk); ?>" 
                             style="height: 100px; object-fit: cover;">
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <?php endif; ?>

            <!-- Deskripsi -->
            <div class="mb-5">
                <h3 class="mb-3">Deskripsi</h3>
                <p class="lead"><?php echo e($produk->deskripsi); ?></p>
            </div>

            <!-- Proses Produksi -->
            <?php if($produk->proses_produksi): ?>
            <div class="mb-5">
                <h3 class="mb-3">Proses Produksi</h3>
                <div class="alert alert-light border">
                    <?php echo e($produk->proses_produksi); ?>

                </div>
            </div>
            <?php endif; ?>

            <!-- Manfaat Budaya -->
            <?php if($produk->manfaat_budaya): ?>
            <div class="mb-5">
                <h3 class="mb-3">Manfaat & Makna Budaya</h3>
                <div class="alert alert-info">
                    <i class="fas fa-lightbulb"></i> <?php echo e($produk->manfaat_budaya); ?>

                </div>
            </div>
            <?php endif; ?>

            <!-- Video -->
            <?php if($produk->video->count() > 0): ?>
            <div class="mb-5">
                <h3 class="mb-3">Video Tutorial</h3>
                <div class="row">
                    <?php $__currentLoopData = $produk->video; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vid): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-6 mb-4">
                        <div class="card">
                            <div class="video-container">
                                <iframe src="<?php echo e($vid->embed_url); ?>" allowfullscreen></iframe>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"><?php echo e($vid->judul_video); ?></h5>
                                <?php if($vid->deskripsi_video): ?>
                                    <p class="card-text text-muted small"><?php echo e($vid->deskripsi_video); ?></p>
                                <?php endif; ?>
                                <a href="<?php echo e($vid->link_youtube); ?>" target="_blank" class="btn btn-sm btn-danger">
                                    <i class="fab fa-youtube"></i> Buka di YouTube
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <?php endif; ?>

            <!-- Nilai Budaya -->
            <?php if($produk->nilaiBudaya->count() > 0): ?>
            <div class="mb-5">
                <h3 class="mb-3">Nilai & Filosofi Budaya</h3>
                <div class="row">
                    <?php $__currentLoopData = $produk->nilaiBudaya; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nilai): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-6 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="card-title text-primary"><?php echo e($nilai->nama_nilai); ?></h6>
                                <p class="card-text small"><?php echo e($nilai->deskripsi_nilai); ?></p>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <?php endif; ?>
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4">
            <!-- Info Card -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0">Informasi Produk</h5>
                </div>
                <div class="card-body">
                    <?php if($produk->harga): ?>
                    <div class="mb-3">
                        <strong>Harga:</strong><br>
                        Rp <?php echo e(number_format($produk->harga, 0, ',', '.')); ?>

                    </div>
                    <?php endif; ?>
                    <?php if($produk->lokasi_pembuatan): ?>
                    <div class="mb-3">
                        <strong><i class="fas fa-map-marker-alt"></i> Lokasi:</strong><br>
                        <?php echo e($produk->lokasi_pembuatan); ?>

                    </div>
                    <?php endif; ?>
                    <?php if($produk->nama_pembuat): ?>
                    <div class="mb-3">
                        <strong><i class="fas fa-user"></i> Pembuat:</strong><br>
                        <?php echo e($produk->nama_pembuat); ?>

                    </div>
                    <?php endif; ?>
                    <div class="mb-3">
                        <strong><i class="fas fa-images"></i> Galeri:</strong><br>
                        <?php echo e($produk->gambar->count()); ?> foto
                    </div>
                    <?php if($produk->video->count() > 0): ?>
                    <div class="mb-3">
                        <strong><i class="fas fa-video"></i> Video:</strong><br>
                        <?php echo e($produk->video->count()); ?> video
                    </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Produk Terkait -->
            <?php if($produkRelated->count() > 0): ?>
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Produk Terkait</h5>
                </div>
                <div class="card-body">
                    <?php $__currentLoopData = $produkRelated; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="mb-3 pb-3 border-bottom">
                        <?php if($item->gambar->count() > 0): ?>
                            <img src="<?php echo e(asset('images/produk/' . $item->gambar->first()->path_gambar)); ?>" 
                                 class="img-fluid rounded mb-2" alt="<?php echo e($item->nama_produk); ?>" style="height: 150px; object-fit: cover; width: 100%;">
                        <?php endif; ?>
                        <h6><a href="<?php echo e(route('produk.show', $item->slug)); ?>" class="text-decoration-none"><?php echo e($item->nama_produk); ?></a></h6>
                        <p class="text-muted small"><?php echo e(Str::limit($item->deskripsi, 60)); ?></p>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <?php endif; ?>

            <!-- Share -->
            <div class="card mt-4">
                <div class="card-body text-center">
                    <h6 class="mb-3">Bagikan</h6>
                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo e(url()->current()); ?>" target="_blank" class="btn btn-sm btn-primary">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a href="https://twitter.com/intent/tweet?url=<?php echo e(url()->current()); ?>&text=<?php echo e($produk->nama_produk); ?>" target="_blank" class="btn btn-sm btn-info">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="https://wa.me/?text=<?php echo e(url()->current()); ?>" target="_blank" class="btn btn-sm btn-success">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\e-ensiklopedia\resources\views/produk/show.blade.php ENDPATH**/ ?>