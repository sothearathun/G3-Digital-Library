{{-- resources/views/components/news-section.blade.php --}}
<div class="news-section">
    <h2 class="section-header">DIGITALES NEWS</h2>
    <div class="digitales-news">
        @if(isset($news) && $news->isNotEmpty())
            @foreach($news as $newsItem)
            <div class="news-card">
                <img src="{{ isset($newsItem->cover_image) ? asset($newsItem->cover_image) : '' }}" alt="News Image">
                <h4>{{ $newsItem->title }}</h4>
                <p>{{ $newsItem->description }}</p>
            </div>
            @endforeach
        @else
            {{-- Default static news items --}}
            <div class="news-card">
                <img src="" alt="News Image">
                <h4>The Future of Digital Reading</h4>
                <p>Explore how AI and immersive technologies are revolutionizing the way we experience books.</p>
            </div>
            <div class="news-card">
                <img src="" alt="News Image">
                <h4>Best Sellers of 2025</h4>
                <p>Discover the most popular books that have captured readers' hearts this year.</p>
            </div>
            <div class="news-card">
                <img src="" alt="News Image">
                <h4>Author Spotlight Series</h4>
                <p>Meet the rising stars in contemporary literature and learn about their creative journey.</p>
            </div>
        @endif
    </div>
</div>