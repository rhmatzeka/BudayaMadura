# 🎠 CAROUSEL PRODUK BUDAYA MADURA

## ✅ Status: CAROUSEL SLIDER SELESAI!

Halaman Sampul Depan sekarang punya carousel/slider modern yang bisa digeser untuk menampilkan 4 produk budaya Madura.

---

## 🎯 Fitur Carousel

### 1. ✅ Auto Slide
- Otomatis bergeser setiap 4 detik
- Smooth transition animation
- Pause saat hover (desktop)

### 2. ✅ Manual Navigation
- **Tombol Previous** (←) - Geser ke kiri
- **Tombol Next** (→) - Geser ke kanan
- **Dots Indicator** - Klik untuk langsung ke slide tertentu
- Tombol dengan hover effect (scale up)

### 3. ✅ Touch/Swipe Support
- Swipe left → Next slide
- Swipe right → Previous slide
- Perfect untuk mobile & tablet

### 4. ✅ Responsive Design
- Desktop: Full carousel dengan tombol samping
- Tablet: Carousel dengan tombol
- Mobile: Swipe gesture support

### 5. ✅ Visual Indicators
- Active dot lebih besar dan gelap
- Inactive dots lebih kecil dan terang
- Smooth transition pada dots

---

## 🎨 Design Specifications

### Carousel Container
- Background: White
- Padding: 30px
- Border-radius: 20px
- Box-shadow: 0 8px 25px rgba(0,0,0,0.12)

### Slides (4 Produk)

**Slide 1: Batik Madura**
- Gradient: #FFE5B4 → #FFD700 (Gold)
- Icon: fa-tshirt (4rem, dark brown)
- Title: Batik Madura
- Description: Kain tradisional dengan motif khas

**Slide 2: Petis Madura**
- Gradient: #FFB6C1 → #FF69B4 (Pink)
- Icon: fa-bottle-droplet (4rem, white)
- Title: Petis Madura
- Description: Saus kental dari rebon

**Slide 3: Rengginang Lorjuk**
- Gradient: #98FB98 → #90EE90 (Green)
- Icon: fa-cookie-bite (4rem, dark brown)
- Title: Rengginang Lorjuk
- Description: Kerupuk dari kerang bambu

**Slide 4: Terasi**
- Gradient: #87CEEB → #4682B4 (Blue)
- Icon: fa-mortar-pestle (4rem, white)
- Title: Terasi
- Description: Bumbu tradisional khas

### Navigation Buttons
- Size: 45px × 45px
- Shape: Circle (border-radius: 50%)
- Background: rgba(139,111,71,0.9)
- Color: White
- Position: Absolute (left/right 10px, top 50%)
- Hover: Scale(1.1) + darker background
- Shadow: 0 3px 10px rgba(0,0,0,0.3)

### Dots Indicator
- Size: 12px × 12px (inactive)
- Size: 30px × 12px (active - elongated)
- Color: #D4A574 (inactive)
- Color: var(--brown) (active)
- Gap: 10px
- Transition: all 0.3s

---

## 🚀 CARA TEST

### Step 1: Clear Cache
```bash
cd C:\laragon\www\e-ensiklopedia
php artisan view:clear
php artisan cache:clear
```

### Step 2: Buka Website
```
http://localhost/e-ensiklopedia
```

### Step 3: Test Carousel

#### A. Test Auto Slide
1. Buka halaman Sampul Depan (Beranda)
2. Tunggu 4 detik
3. Carousel harus otomatis geser ke slide berikutnya
4. Setelah slide 4, kembali ke slide 1

**Checklist:**
- [ ] Auto slide berfungsi (4 detik interval)
- [ ] Smooth transition
- [ ] Loop dari slide 4 ke slide 1

#### B. Test Manual Navigation (Tombol)
1. Klik tombol **Next** (→)
   - [ ] Carousel geser ke kanan
   - [ ] Smooth animation
   - [ ] Dots indicator update
2. Klik tombol **Previous** (←)
   - [ ] Carousel geser ke kiri
   - [ ] Smooth animation
   - [ ] Dots indicator update
3. Hover pada tombol
   - [ ] Tombol scale up
   - [ ] Background lebih gelap

#### C. Test Dots Indicator
1. Klik dot ke-2
   - [ ] Langsung ke slide 2
   - [ ] Dot ke-2 jadi aktif (lebih besar)
2. Klik dot ke-4
   - [ ] Langsung ke slide 4
   - [ ] Dot ke-4 jadi aktif
3. Perhatikan animasi
   - [ ] Active dot elongated (30px width)
   - [ ] Inactive dot circular (12px)

#### D. Test Hover Pause
1. Hover mouse di atas carousel
   - [ ] Auto slide berhenti
2. Mouse keluar dari carousel
   - [ ] Auto slide mulai lagi

#### E. Test Touch/Swipe (Mobile)
1. Buka di mobile atau resize browser ke mobile view
2. Swipe left (geser ke kiri)
   - [ ] Carousel geser ke slide berikutnya
3. Swipe right (geser ke kanan)
   - [ ] Carousel geser ke slide sebelumnya
4. Test sensitivity
   - [ ] Swipe minimal 50px untuk trigger

#### F. Test Responsive
1. **Desktop (> 992px)**
   - [ ] Carousel full width
   - [ ] Tombol terlihat jelas
   - [ ] Dots di bawah
2. **Tablet (768px - 992px)**
   - [ ] Carousel menyesuaikan
   - [ ] Tombol tetap terlihat
3. **Mobile (< 768px)**
   - [ ] Carousel stack di bawah judul
   - [ ] Swipe gesture berfungsi
   - [ ] Tombol tetap accessible

---

## 🎬 Animation Details

### Slide Transition
```css
transition: transform 0.5s ease-in-out
```
- Duration: 0.5 second
- Easing: ease-in-out (smooth start & end)

### Button Hover
```css
transition: all 0.3s
transform: translateY(-50%) scale(1.1)
```
- Duration: 0.3 second
- Scale: 1.1 (10% bigger)

### Dots Transition
```css
transition: all 0.3s
```
- Width: 12px → 30px (active)
- Border-radius: 50% → 6px (active)

---

## 📱 Touch Gesture Support

### Swipe Detection
- **Swipe Left** (touchEndX < touchStartX - 50px) → Next slide
- **Swipe Right** (touchEndX > touchStartX + 50px) → Previous slide
- Minimum swipe distance: 50px

### Events
- `touchstart` → Record start position
- `touchend` → Record end position & calculate swipe
- `handleSwipe()` → Determine direction & trigger slide

---

## 🔧 JavaScript Functions

### Core Functions

**updateCarousel()**
- Update carousel position (translateX)
- Update dots indicator (active/inactive)

**nextSlide()**
- Increment currentSlide
- Loop to 0 if at end
- Call updateCarousel()
- Reset auto slide timer

**prevSlide()**
- Decrement currentSlide
- Loop to last slide if at start
- Call updateCarousel()
- Reset auto slide timer

**goToSlide(index)**
- Jump to specific slide
- Call updateCarousel()
- Reset auto slide timer

**startAutoSlide()**
- Start interval (4000ms)
- Auto call nextSlide()

**resetAutoSlide()**
- Clear current interval
- Start new interval

### Event Listeners

**Mouse Events**
- `mouseenter` → Pause auto slide
- `mouseleave` → Resume auto slide

**Touch Events**
- `touchstart` → Record start X
- `touchend` → Record end X & handle swipe

---

## 🎨 Customization

### Change Auto Slide Speed
```javascript
// In startAutoSlide() function
autoSlideInterval = setInterval(() => {
    nextSlide();
}, 4000); // Change 4000 to desired milliseconds
```

### Change Transition Speed
```javascript
// In carousel style
transition: transform 0.5s ease-in-out
// Change 0.5s to desired seconds
```

### Change Swipe Sensitivity
```javascript
// In handleSwipe() function
if (touchEndX < touchStartX - 50) // Change 50 to desired pixels
```

### Add More Slides
1. Add new slide HTML in carousel
2. Update `totalSlides` variable
3. Add new dot in dots indicator

---

## ✅ CHECKLIST FINAL

### Functionality:
- [ ] Auto slide berfungsi (4 detik)
- [ ] Tombol Next berfungsi
- [ ] Tombol Previous berfungsi
- [ ] Dots indicator berfungsi
- [ ] Hover pause berfungsi
- [ ] Swipe gesture berfungsi (mobile)
- [ ] Loop carousel berfungsi

### Visual:
- [ ] 4 slide dengan gradient berbeda
- [ ] Icon dan text terlihat jelas
- [ ] Tombol navigation terlihat
- [ ] Dots indicator terlihat
- [ ] Active dot highlighted
- [ ] Smooth animation

### Responsive:
- [ ] Desktop: Full layout
- [ ] Tablet: Adjusted layout
- [ ] Mobile: Stack layout + swipe

---

## 🔧 TROUBLESHOOTING

### Carousel tidak bergerak
```bash
# Clear cache
php artisan view:clear
php artisan cache:clear

# Check browser console (F12) for JavaScript errors
```

### Auto slide tidak jalan
- Cek JavaScript console untuk error
- Pastikan `startAutoSlide()` dipanggil
- Cek interval value (4000ms)

### Tombol tidak muncul
- Cek z-index (harus 10)
- Cek position: absolute
- Cek parent position: relative

### Swipe tidak berfungsi
- Test di real mobile device (bukan emulator)
- Cek touch event listeners
- Cek swipe sensitivity (50px)

### Dots tidak update
- Cek `updateCarousel()` function
- Cek querySelectorAll('.dot')
- Cek CSS transition

---

## 🎉 SELESAI!

Carousel produk budaya Madura sudah siap dengan fitur:
- ✅ Auto slide (4 detik)
- ✅ Manual navigation (tombol + dots)
- ✅ Touch/swipe support
- ✅ Hover pause
- ✅ Smooth animation
- ✅ Responsive design

**File yang diubah:**
- `resources/views/modul/pages/sampul-depan.blade.php`

**Siap untuk ditest! 🚀**

---

**Created:** January 30, 2026  
**Project:** E-Ensiklopedia Etnosains Madura  
**Status:** ✅ READY TO TEST
