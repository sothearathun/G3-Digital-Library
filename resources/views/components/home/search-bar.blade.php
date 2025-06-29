<link rel="stylesheet" href="{{ asset('css/web/search_bar.css') }}">
<script src="{{ asset('js/web/search_bar.js') }}"></script>

{{--  Search Bar --}}
<section class="main-search-section">

    <h1 class="visually-hidden">Book Search</h1> {{-- Hidden heading for accessibility --}}

    <form action="{{ route('search_page') }}" method="GET" class="main-search-form" role="search">

        <label for="main-search-input" class="visually-hidden">Search for books, authors, genres</label>
        <input type="text" id="main-search-input" name="query" placeholder="Explore Your Fantasy" aria-label="Search for books, authors, or genres" value="{{ request('query') }}">

        <button type="submit" class="search-icon-button" aria-label="Perform search">
            <i class="fas fa-search" aria-hidden="true"></i>
        </button>
        
    </form>

</section>
