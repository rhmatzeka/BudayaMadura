<div style="background: linear-gradient(135deg, #FFF8E7 0%, #F5E6D3 100%); padding: 50px 30px; border-radius: 20px; margin-bottom: 40px; box-shadow: 0 8px 30px rgba(0,0,0,0.1);">
    <div class="row align-items-center">
        <div class="col-md-6 mb-4 mb-md-0">
            <h1 style="font-family: 'Playfair Display', serif; font-size: 2.5rem; color: var(--dark-brown); margin-bottom: 20px;">
                E-ENSIKLOPEDIA<br>ETNOSAINS MADURA
            </h1>
            <p style="font-size: 1.1rem; color: var(--brown); margin-bottom: 30px;">
                Pembelajaran IPAS Berbasis Budaya Lokal untuk Siswa Sekolah Dasar
            </p>
            <a href="<?php echo e(route('modul.show', 'identitas')); ?>" class="btn btn-primary-custom btn-lg">
                <i class="fas fa-play-circle me-2"></i>Mulai Eksplorasi
            </a>
        </div>
        <div class="col-md-6">
            <div style="background: white; padding: 30px; border-radius: 20px; box-shadow: 0 8px 25px rgba(0,0,0,0.12);">
                <h4 style="color: var(--brown); text-align: center; margin-bottom: 25px;">
                    <i class="fas fa-palette me-2"></i>Produk Budaya Madura
                </h4>
                
                <!-- Carousel Container -->
                <div style="position: relative; overflow: hidden; border-radius: 15px;">
                    <!-- Carousel Wrapper -->
                    <div id="produkCarousel" style="display: flex; transition: transform 0.5s ease-in-out;">
                        <!-- Slide 1: Batik Madura -->
                        <div class="carousel-item-custom" style="min-width: 100%; padding: 10px;">
                            <div style="background: linear-gradient(135deg, #FFE5B4 0%, #FFD700 100%); padding: 40px 20px; border-radius: 15px; text-align: center; box-shadow: 0 5px 20px rgba(255,215,0,0.3);">
                                <i class="fas fa-tshirt" style="font-size: 4rem; color: var(--dark-brown); margin-bottom: 15px;"></i>
                                <h3 style="margin: 15px 0 10px 0; font-weight: 700; color: var(--dark-brown); font-family: 'Playfair Display', serif;">Batik Madura</h3>
                                <p style="margin: 0; color: #5D4E37; font-size: 0.95rem;">Kain tradisional dengan motif khas</p>
                            </div>
                        </div>
                        
                        <!-- Slide 2: Petis Madura -->
                        <div class="carousel-item-custom" style="min-width: 100%; padding: 10px;">
                            <div style="background: linear-gradient(135deg, #FFB6C1 0%, #FF69B4 100%); padding: 40px 20px; border-radius: 15px; text-align: center; box-shadow: 0 5px 20px rgba(255,105,180,0.3);">
                                <i class="fas fa-bottle-droplet" style="font-size: 4rem; color: white; margin-bottom: 15px;"></i>
                                <h3 style="margin: 15px 0 10px 0; font-weight: 700; color: white; font-family: 'Playfair Display', serif;">Petis Madura</h3>
                                <p style="margin: 0; color: rgba(255,255,255,0.95); font-size: 0.95rem;">Saus kental dari rebon</p>
                            </div>
                        </div>
                        
                        <!-- Slide 3: Rengginang Lorjuk -->
                        <div class="carousel-item-custom" style="min-width: 100%; padding: 10px;">
                            <div style="background: linear-gradient(135deg, #98FB98 0%, #90EE90 100%); padding: 40px 20px; border-radius: 15px; text-align: center; box-shadow: 0 5px 20px rgba(144,238,144,0.3);">
                                <i class="fas fa-cookie-bite" style="font-size: 4rem; color: var(--dark-brown); margin-bottom: 15px;"></i>
                                <h3 style="margin: 15px 0 10px 0; font-weight: 700; color: var(--dark-brown); font-family: 'Playfair Display', serif;">Rengginang Lorjuk</h3>
                                <p style="margin: 0; color: #5D4E37; font-size: 0.95rem;">Kerupuk dari kerang bambu</p>
                            </div>
                        </div>
                        
                        <!-- Slide 4: Terasi -->
                        <div class="carousel-item-custom" style="min-width: 100%; padding: 10px;">
                            <div style="background: linear-gradient(135deg, #87CEEB 0%, #4682B4 100%); padding: 40px 20px; border-radius: 15px; text-align: center; box-shadow: 0 5px 20px rgba(70,130,180,0.3);">
                                <i class="fas fa-mortar-pestle" style="font-size: 4rem; color: white; margin-bottom: 15px;"></i>
                                <h3 style="margin: 15px 0 10px 0; font-weight: 700; color: white; font-family: 'Playfair Display', serif;">Terasi</h3>
                                <p style="margin: 0; color: rgba(255,255,255,0.95); font-size: 0.95rem;">Bumbu tradisional khas</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Navigation Buttons -->
                    <button onclick="prevSlide()" style="position: absolute; left: 10px; top: 50%; transform: translateY(-50%); background: rgba(139,111,71,0.9); border: none; color: white; width: 45px; height: 45px; border-radius: 50%; cursor: pointer; font-size: 1.2rem; display: flex; align-items: center; justify-content: center; box-shadow: 0 3px 10px rgba(0,0,0,0.3); transition: all 0.3s; z-index: 10;" onmouseover="this.style.background='rgba(93,78,55,1)'; this.style.transform='translateY(-50%) scale(1.1)'" onmouseout="this.style.background='rgba(139,111,71,0.9)'; this.style.transform='translateY(-50%) scale(1)'">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <button onclick="nextSlide()" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); background: rgba(139,111,71,0.9); border: none; color: white; width: 45px; height: 45px; border-radius: 50%; cursor: pointer; font-size: 1.2rem; display: flex; align-items: center; justify-content: center; box-shadow: 0 3px 10px rgba(0,0,0,0.3); transition: all 0.3s; z-index: 10;" onmouseover="this.style.background='rgba(93,78,55,1)'; this.style.transform='translateY(-50%) scale(1.1)'" onmouseout="this.style.background='rgba(139,111,71,0.9)'; this.style.transform='translateY(-50%) scale(1)'">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
                
                <!-- Dots Indicator -->
                <div style="display: flex; justify-content: center; gap: 10px; margin-top: 20px;">
                    <span class="dot" onclick="goToSlide(0)" style="width: 12px; height: 12px; border-radius: 50%; background: var(--brown); cursor: pointer; transition: all 0.3s;"></span>
                    <span class="dot" onclick="goToSlide(1)" style="width: 12px; height: 12px; border-radius: 50%; background: #D4A574; cursor: pointer; transition: all 0.3s;"></span>
                    <span class="dot" onclick="goToSlide(2)" style="width: 12px; height: 12px; border-radius: 50%; background: #D4A574; cursor: pointer; transition: all 0.3s;"></span>
                    <span class="dot" onclick="goToSlide(3)" style="width: 12px; height: 12px; border-radius: 50%; background: #D4A574; cursor: pointer; transition: all 0.3s;"></span>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
let currentSlide = 0;
const totalSlides = 4;
let autoSlideInterval;

function updateCarousel() {
    const carousel = document.getElementById('produkCarousel');
    const dots = document.querySelectorAll('.dot');
    
    // Update carousel position
    carousel.style.transform = `translateX(-${currentSlide * 100}%)`;
    
    // Update dots
    dots.forEach((dot, index) => {
        if (index === currentSlide) {
            dot.style.background = 'var(--brown)';
            dot.style.width = '30px';
            dot.style.borderRadius = '6px';
        } else {
            dot.style.background = '#D4A574';
            dot.style.width = '12px';
            dot.style.borderRadius = '50%';
        }
    });
}

function nextSlide() {
    currentSlide = (currentSlide + 1) % totalSlides;
    updateCarousel();
    resetAutoSlide();
}

function prevSlide() {
    currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
    updateCarousel();
    resetAutoSlide();
}

function goToSlide(index) {
    currentSlide = index;
    updateCarousel();
    resetAutoSlide();
}

function startAutoSlide() {
    autoSlideInterval = setInterval(() => {
        nextSlide();
    }, 4000); // Auto slide every 4 seconds
}

function resetAutoSlide() {
    clearInterval(autoSlideInterval);
    startAutoSlide();
}

// Touch/Swipe support for mobile
let touchStartX = 0;
let touchEndX = 0;

const carouselContainer = document.getElementById('produkCarousel').parentElement;

carouselContainer.addEventListener('touchstart', (e) => {
    touchStartX = e.changedTouches[0].screenX;
});

carouselContainer.addEventListener('touchend', (e) => {
    touchEndX = e.changedTouches[0].screenX;
    handleSwipe();
});

function handleSwipe() {
    if (touchEndX < touchStartX - 50) {
        nextSlide(); // Swipe left
    }
    if (touchEndX > touchStartX + 50) {
        prevSlide(); // Swipe right
    }
}

// Start auto slide on page load
startAutoSlide();

// Pause auto slide on hover
carouselContainer.addEventListener('mouseenter', () => {
    clearInterval(autoSlideInterval);
});

carouselContainer.addEventListener('mouseleave', () => {
    startAutoSlide();
});
</script>

<!-- Ikon Sains dan Budaya -->
<div class="row mb-4">
    <div class="col-md-6 mb-3">
        <div style="background: linear-gradient(135deg, #E8F4F8 0%, #D4E8F0 100%); padding: 30px; border-radius: 15px; text-align: center;">
            <i class="fas fa-flask" style="font-size: 3rem; color: var(--brown);"></i>
            <h4 style="color: var(--dark-brown); margin-top: 15px;">Ikon Sains</h4>
            <p style="color: #666;">Pembelajaran IPAS yang menyenangkan</p>
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <div style="background: linear-gradient(135deg, #FFE5E5 0%, #FFD4D4 100%); padding: 30px; border-radius: 15px; text-align: center;">
            <i class="fas fa-landmark" style="font-size: 3rem; color: var(--brown);"></i>
            <h4 style="color: var(--dark-brown); margin-top: 15px;">Ikon Budaya</h4>
            <p style="color: #666;">Melestarikan warisan budaya Madura</p>
        </div>
    </div>
</div><?php /**PATH C:\laragon\www\e-ensiklopedia\resources\views/modul/pages/sampul-depan.blade.php ENDPATH**/ ?>