{{-- resources/views/components/hero-section.blade.php --}}
<section class="hero-section">
    <div class="hero-quote">
        <strong>"Nothing contributes so much to tranquillize the mind as a steady purpose — a point on which the soul may fix its intellectual eye."</strong>
        <small>— Mary Wollstonecraft Shelley (1797-1851)</small>
        <a href="" class="explore-button">Explore New Fantasy</a>
    </div>
    <div class="hero-image">
        @if(isset($trendingBook) && $trendingBook->isNotEmpty())
            <img src="{{ asset($trendingBook->first()->cover_image) }}" alt="Book Cover">
        @else
            <img src="" alt="Book Cover">
        @endif
        <small>Image credits: Wikimedia Commons</small>
    </div>
</section>