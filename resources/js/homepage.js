// Book Carousel JavaScript
        let currentSlide = 0;
        const track = document.getElementById('bookCarouselTrack');
        const items = track.querySelectorAll('.book-item');
        const totalSlides = Math.ceil(items.length / 3);
        
        // Create indicators
        const indicatorsContainer = document.getElementById('carouselIndicators');
        for (let i = 0; i < totalSlides; i++) {
            const indicator = document.createElement('div');
            indicator.className = 'carousel-indicator';
            if (i === 0) indicator.classList.add('active');
            indicator.onclick = () => goToSlide(i);
            indicatorsContainer.appendChild(indicator);
        }
        
        function updateCarousel() {
            const translateX = -currentSlide * 100;
            track.style.transform = `translateX(${translateX}%)`;
            
            // Update indicators
            document.querySelectorAll('.carousel-indicator').forEach((indicator, index) => {
                indicator.classList.toggle('active', index === currentSlide);
            });
        }
        
        function nextSlide() {
            currentSlide = (currentSlide + 1) % totalSlides;
            updateCarousel();
        }
        
        function previousSlide() {
            currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
            updateCarousel();
        }
        
        function goToSlide(index) {
            currentSlide = index;
            updateCarousel();
        }
        
        // Auto-slide functionality
        setInterval(nextSlide, 5000);
        
        // Touch/swipe support for mobile
        let startX = 0;
        let endX = 0;
        
        track.addEventListener('touchstart', (e) => {
            startX = e.touches[0].clientX;
        });
        
        track.addEventListener('touchend', (e) => {
            endX = e.changedTouches[0].clientX;
            handleSwipe();
        });
        
        function handleSwipe() {
            const threshold = 50;
            const diff = startX - endX;
            
            if (Math.abs(diff) > threshold) {
                if (diff > 0) {
                    nextSlide();
                } else {
                    previousSlide();
                }
            }
        }
