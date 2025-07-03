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

        <!-- {{-- Show search results info only when there's a search query --}}
        @if(isset($results) && request('query'))
            <div class="search-results mt-4">
                <h4>Results for "{{ request('query') }}":</h4>
                <p>Found {{ $results->total() }} book(s)</p>
            </div>
        @endif

        {{-- Show initial page info when no search --}}
        @if(!request('query') && isset($show_initial) && $show_initial)
            <div class="search-results mt-4">
                <h4>Trending Books:</h4>
                <p>Showing {{ $v_display_results->count() }} trending book(s)</p>
            </div>
        @endif -->
    </div>

    <br>

    {{-- Suggested Searches / Popular Searches --}}
    <section class="suggested-searches-section">
        <h2 class="section-subtitle">Suggested Searches:</h2>
        <div class="suggested-tags">
           
        </div>
    </section>

    {{-- Filter and Sort Options --}}
    <section class="filter-sort-section" aria-labelledby="filter-sort-heading">
        <h3 id="filter-sort-heading" class="visually-hidden">Filter and Sort Options</h3>
        <div class="filter-options">
            <label for="genre-filter">Genre:</label>
            <div class="dropdown-checkbox">
                <button class="dropdown-toggle" type="button" id="genre-filter" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    All Genres
                </button>
                <div class="dropdown-menu" aria-labelledby="genre-filter">
                    @foreach($f_genres as $genre)
                        <label>
                            <input type="checkbox" name="book_genres[]" value="{{ $genre->genre_name }}">
                            {{ $genre->genre_name }}
                        </label>
                    @endforeach
                </div>
            </div>

            <label for="rating-filter">Min. Rating:</label>
            <select id="rating-filter" name="min_rating" aria-controls="search-results-list">
                <option value="">Any</option>
                <option value="5">5 Stars</option>
                <option value="4">4 Stars</option>
                <option value="3">3 Stars</option>
                <option value="2">2 Stars</option>
                <option value="1">1 Star</option>
                <option value="0">no rating</option>
            </select>
        </div>
    </section>

    {{-- Individual Search Result Items --}}
    <section class="search-results-list" id="search-results-list" aria-live="polite" aria-atomic="true">
        
        @if($v_display_results->count() > 0)
            @foreach($v_display_results as $display_books)
                <article class="search-result-item">
                    <img src="{{ asset('uploads/' . $display_books->book_cover) }}" alt="{{ $display_books->book_title }} Cover">
                    <div class="result-details">
                        <h3><span class="book-title">{{ $display_books->book_title }}</span></h3>
                        <p class="author-name">by {{ $display_books->author_name }}</p>
                        <p class="released-date">Published: {{ \Carbon\Carbon::parse($display_books->released_date)->format('j F Y') }}</p>
                        <p class="book-description">{{ $display_books->description }}</p>
                        <a href="{{route('viewbook', ['book_id' => $display_books->book_id])}}" class="view-book-button" aria-label="View details for {{ $display_books->book_title }}">View Book</a>
                    </div>
                </article>
            @endforeach
        @else
            {{-- Show this when no results found for a search query --}}
            @if(request('query'))
                <div class="no-results-found" role="alert">
                    <p>No books found matching "{{ request('query') }}".</p>
                    <p>Try refining your search or <a href="{{ route('search.page') }}">browse our trending books</a>.</p>
                </div>
            @endif
        @endif
        
    </section>

</main>

@push('scripts')
    <script src="{{ asset('js/web/search_page.js') }}"></script>
@endpush

@endsection