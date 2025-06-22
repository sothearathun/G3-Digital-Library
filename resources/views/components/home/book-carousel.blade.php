{{-- resources/views/components/book-carousel.blade.php --}}
<div class="book-carousel-container">
    <h2 class="section-header"> POPULAR BOOKS </h2>
    <div class="book-carousel">
        <div class="book-carousel-track" id="bookCarouselTrack{{ $carouselId }}">
            @foreach($books as $book) 
            <div class="book-item">
                <img src="{{ asset($book->cover_image) }}" alt="Book Cover">
                <div class="book-details">
                    <h3>{{ $book->book_title }}</h3>
                    <p>{{ $book->description }}</p>
                    <div class="book-meta">
                        <span>⭐ 4.5</span>             {{-- TODO: Replace with actual rating --}}
                        <span>❤️ 120</span>            {{-- TODO: Replace with actual likes --}}
                        <span>💬 30</span>             {{-- TODO: Replace with actual comments --}}
                        <span>📖 {{ $book->page_count }}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Navigation buttons -->
    <button class="carousel-nav prev" onclick="previousSlide('{{ $carouselId }}')">❮</button>
    <button class="carousel-nav next" onclick="nextSlide('{{ $carouselId }}')">❯</button>
    
    <div class="carousel-indicators" id="carouselIndicators{{ $carouselId }}"></div>
</div>