{{-- resources/views/components/news-section.blade.php --}}

@foreach($news as $newsItem)
<div class="news-card">
    <img src="{{ asset('uploads/' . $newsItem->news_cover) }}" alt="News Image">
    <h4>{{ $newsItem->news_title }}</h4>
    <p>{{ $newsItem->news_des }}</p>
        <a href="{{ $newsItem->news_link }}" target="_blank">Read More</a>
</div>
@endforeach
