{{-- resources/views/frontend-pages/search_page.blade.php --}}

@extends('layouts.app')

@section('title', 'Digitales - Search')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/web/search_page.css') }}">
@endpush

@section('content')

<a href="" class="back-button" onclick="history.back(); return false;">
    <span style="font-size: 20px;">← back</span>
</a>

{{-- Search Page Content --}}
<main class="container search-page-wrapper">

    {{-- Search Bar --}}
    <div class="container mt-5">
        <h2 class="mb-4" style="text-align: center;">Search for Books</h2>

        {{-- UPDATED FORM - Uses GET method and points to search route --}}
        <form action="{{ route('processSearch') }}" method="GET" class="search-form">
            <input
                type="text"
                name="query"
                placeholder="Enter book title, author, or keyword..."
                class="search-input"
                value="{{ request('query') }}"
                required
            >
            <button type="submit" class="search-button">Search</button>
        </form>

    </div>

    <br>

    {{-- Suggested Searches / Popular Searches --}}
    <section class="suggested-searches-section">
        <h2 class="section-subtitle">Search Result:</h2>
        <div class="suggested-tags">     
        </div>
    </section>

{{-- Individual Search Result Items --}}
<section class="search-results-list" id="search-results-list" aria-live="polite" aria-atomic="true">

    {{-- Display Results --}}

    @if($v_display_results->isEmpty())
    <p>No books found for your filters.</p>
@else
    <h3>Search Results</h3>
    <div class="book-grid">
        @foreach($v_display_results as $display_books)
            <article class="search-result-item">
                <img src="{{ asset('uploads/' . $display_books->book_cover) }}" alt="{{ $display_books->book_title }} Cover">
                <div class="result-details">
                    <h3><span class="book-title">{{ $display_books->book_title }}</span></h3>
                    <p class="author-name">by {{ $display_books->author_name }}</p>
                    <p class="released-date">Published: {{ \Carbon\Carbon::parse($display_books->released_date)->format('j F Y') }}</p>
                    <p class="book-description">{{ $display_books->description }}</p>
                    <a href="{{ route('viewbook', ['book_id' => $display_books->book_id]) }}" class="view-book-button" aria-label="View details for {{ $display_books->book_title }}">View Book</a>
                </div>
            </article>
        @endforeach
    </div>
@endif


</section>

</main>

@push('scripts')
    <script src="{{ asset('js/web/search_page.js') }}"></script>
@endpush

@endsection