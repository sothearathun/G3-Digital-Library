<div class="book-carousel-container">
    <div class="book-carousel">
        <div class="book-carousel-track" id="bookCarouselTrack" style="display: flex; flex-wrap: nowrap; overflow-x: auto;">
        
        @foreach($books as $book) 
        <div class="book-item" onclick="location.href=`{{ route('viewbook', ['book_id' => $book->book_id]) }}`" style="cursor: pointer;">
            {{-- Book Cover Image --}}
            <img src="{{ asset('uploads/' . $book->book_cover) }}" alt="{{ $book->book_title }}">
            <div class="book-details">
                <h3>{{ $book->book_title }}</h3>
                <p>{{ $book->description }}</p>

                <div class="book-meta">
                    <span>⭐ </span>             {{-- TODO: Replace with actual rating --}}
                    <span>❤️ </span>            {{-- TODO: Replace with actual likes --}}
                    <span>💬 </span>             {{-- TODO: Replace with actual comments --}}
                    <span>📖 {{ $book->total_pages }}</span>
                </div>

            </div>
        </div>
        @endforeach

        </div>
    </div>

    <!-- button for swipe -->
    <button class="carousel-nav prev" onclick="previousSlide()">❮</button>
    <button class="carousel-nav next" onclick="nextSlide()">❯</button>
    
    <div class="carousel-indicators" id="carouselIndicators"></div>
</div>