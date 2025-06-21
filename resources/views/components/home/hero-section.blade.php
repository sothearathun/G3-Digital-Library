<section class="hero-section">
    <div class="hero-quote">
        <strong>{{ $quote ?? '“A quote to inspire.”' }}</strong>
        <small>{{ $author ?? '— Unknown' }}</small>
        <a href="#" class="explore-button">Explore New Fantasy</a>
    </div>
    <div class="hero-image">
        <img src="{{ $image ?? '' }}" alt="Book Cover">
        <small>Image credits: Wikimedia Commons</small>
    </div>
</section>