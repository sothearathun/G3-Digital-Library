<h2 class="section-header">{{ $title }}</h2>
<div class="book-carousel-container">
    <div class="book-carousel">
        <div class="book-carousel-track" id="bookCarouselTrack">
            @foreach ($books as $book)
                <div class="book-item">
                    <img src="{{ asset($book->cover_image) }}" alt="Book Cover">
                    <div class="book-details">
                        <h3>{{ $book->book_title }}</h3>
                        <p>{{ $book->description }}</p>
                        <div class="book-meta">
                            <span>⭐ 4.5</span>
                            <span>❤️ 120</span>
                            <span>💬 30</span>
                            <span>📖 {{ $book->page_count }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <button class="carousel-nav prev" onclick="previousSlide()">❮</button>
    <button class="carousel-nav next" onclick="nextSlide()">❯</button>
    <div class="carousel-indicators" id="carouselIndicators"></div>
</div>