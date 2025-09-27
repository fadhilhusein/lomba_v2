document.addEventListener('DOMContentLoaded', () => {
    // Pastikan semua selektor kelas di sini sesuai dengan HTML Anda
    const sliderContainer = document.querySelector('.slider-container');
    const sliderWrapper = document.querySelector('.slider-wrapper');
    const slideItems = document.querySelectorAll('.slide-item');
    const prevBtn = document.querySelector('.prev-btn');
    const nextBtn = document.querySelector('.next-btn');

    const totalSlides = slideItems.length; 
    let currentSlideIndex = 0; 
    
    // Timer otomatis (5000ms = 5 detik)
    const intervalTime = 5000; 
    let slideInterval; 

    // 1. MEMUAT GAMBAR LATAR BELAKANG
    slideItems.forEach(slide => {
        const imagePath = slide.getAttribute('data-img-path');
        if (imagePath) {
            slide.style.backgroundImage = `url('${imagePath}')`;
        }
    });

    // Fungsi untuk menggeser slide
    function goToSlide(index) {
        if (index < 0) {
            currentSlideIndex = totalSlides - 1; 
        } else if (index >= totalSlides) {
            currentSlideIndex = 0; 
        } else {
            currentSlideIndex = index;
        }
        
        // Menghitung persentase pergeseran
        const offset = currentSlideIndex * -50; 
        sliderWrapper.style.transform = `translateX(${offset}%)`;
    }

    // Fungsi untuk geser ke slide berikutnya (dipanggil oleh timer)
    function nextSlide() {
        goToSlide(currentSlideIndex + 1);
    }
    
    // Fungsi untuk memulai autoplay
    function startAutoplay() {
        // Hentikan interval lama (jika ada) sebelum memulai yang baru
        stopAutoplay();
        slideInterval = setInterval(nextSlide, intervalTime);
    }
    
    // Fungsi untuk menghentikan autoplay
    function stopAutoplay() {
        clearInterval(slideInterval);
    }

    // 2. EVENT LISTENERS
    // Saat user klik, hentikan timer sebentar, geser, lalu mulai lagi
    nextBtn.addEventListener('click', () => {
        stopAutoplay();
        nextSlide();
        startAutoplay(); 
    });

    prevBtn.addEventListener('click', () => {
        stopAutoplay();
        goToSlide(currentSlideIndex - 1);
        startAutoplay(); 
    });

    // Hentikan geser saat user arahkan mouse/jari ke slider
    sliderContainer.addEventListener('mouseenter', stopAutoplay);
    sliderContainer.addEventListener('mouseleave', startAutoplay);


    // 3. START: MEMULAI AUTOPLAY SAAT HALAMAN DIMUAT
    startAutoplay();
});