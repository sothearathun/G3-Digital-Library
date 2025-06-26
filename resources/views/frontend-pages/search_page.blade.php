<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Page - MyBookstore</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700&family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="{{ asset('css/web/search_page.css') }}">
    </head>
<body>
    <x-navigation.header/>

    {{-- Search Page Content --}}
    <main class="container search-page-wrapper">

        {{--  Search Bar --}}
        <!-- 
        <section class="main-search-section">
            <h1 class="visually-hidden">Book Search</h1> {{-- Hidden heading for accessibility --}}
            <form action="{{ route('books.search') }}" method="GET" class="main-search-form" role="search">
                <label for="main-search-input" class="visually-hidden">Search for books, authors, genres</label>
                <input type="text" id="main-search-input" name="query" placeholder="Explore Your Fantasy" aria-label="Search for books, authors, or genres" value="{{ request('query') }}">
                <button type="submit" class="search-icon-button" aria-label="Perform search">
                    <i class="fas fa-search" aria-hidden="true"></i>
                </button>
            </form>
        </section> 
        -->
        
        @include('components.navigation.search')
        

<br>

        <!-- {{-- Suggested Searches / Popular Searches --}} -->
        <section class="suggested-searches-section">
            <h2 class="section-subtitle">Suggested Searches:</h2>
            <div class="suggested-tags">
                <!-- 
                <a href="{{ route('books.search', ['query' => 'Fantasy']) }}" class="suggested-tag">Fantasy</a>
                <a href="{{ route('books.search', ['query' => 'Mystery']) }}" class="suggested-tag">Mystery</a>
                <a href="{{ route('books.search', ['query' => 'Science Fiction']) }}" class="suggested-tag">Science Fiction</a>
                <a href="{{ route('books.search', ['query' => 'Historical Fiction']) }}" class="suggested-tag">Historical Fiction</a>
                <a href="{{ route('books.search', ['query' => 'Young Adult']) }}" class="suggested-tag">Young Adult</a> 
                -->
                
                <a href="" class="suggested-tag">Young Adult</a> 
                <a href="" class="suggested-tag">Fantasy</a> 
                <a href="" class="suggested-tag">Science Fiction</a> 
                


            </div>
        </section>

        <h2 class="section-header">Search Results</h2>

        {{-- Filter and Sort Options --}}
        <section class="filter-sort-section" aria-labelledby="filter-sort-heading">
            <h3 id="filter-sort-heading" class="visually-hidden">Filter and Sort Options</h3> {{-- Hidden heading for accessibility --}}
            <div class="filter-options">
                <label for="genre-filter">Genre:</label>
                <select id="genre-filter" name="genre" aria-controls="search-results-list">
                    <option value="">All Genres</option>
                    <option value="fantasy">Fantasy</option>
                    <option value="mystery">Mystery</option>
                    <option value="scifi">Science Fiction</option>
                    {{-- Add more options dynamically from database --}}
                </select>

                <label for="rating-filter">Min. Rating:</label>
                <select id="rating-filter" name="min_rating" aria-controls="search-results-list">
                    <option value="">Any</option>
                    <option value="4">4 Stars & Up</option>
                    <option value="3">3 Stars & Up</option>
                </select>
            </div>

            <div class="sort-options">
                <label for="sort-by">Sort By:</label>
                <select id="sort-by" name="sort_by" aria-controls="search-results-list">
                    <option value="relevance">Relevance</option>
                    <option value="newest">Newest First</option>
                    <option value="rating">Top Rated</option>
                    <option value="title_asc">Title (A-Z)</option>
                </select>
            </div>
        </section>

        {{-- Individual Search Result Items --}}
        <section class="search-results-list" id="search-results-list" aria-live="polite" aria-atomic="true">
            {{-- Example Search Result Item 1 (repeat for each result) --}}
            <article class="search-result-item">
                <img src="https://via.placeholder.com/120x180/AAAAAA/FFFFFF?text=Book" alt="Cover of Harry Potter and the Goblet of Fire" class="result-book-cover">
                <div class="result-details">
                    <h3>Harry Potter and the Goblet of Fire <span class="book-series-info">(Harry Potter, Book 4)</span></h3>
                    <p class="author-info">by J.K. Rowling (Author), Mary GrandPré (Illustrator)</p>
                    <p class="publication-info">Paperback – September 1, 2002</p>
                    <p class="short-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    <a href="#" class="view-book-button" aria-label="View details for Harry Potter and the Goblet of Fire">View Book</a>
                </div>
            </article>

            {{-- Example Search Result Item 2 --}}
            <article class="search-result-item">
                <img src="https://via.placeholder.com/120x180/AAAAAA/FFFFFF?text=Book" alt="Cover of Harry Potter and the Sorcerer's Stone" class="result-book-cover">
                <div class="result-details">
                    <h3>Harry Potter and the Sorcerer's Stone <span class="book-series-info">(Harry Potter, Book 1)</span></h3>
                    <p class="author-info">by J.K. Rowling (Author), Mary GrandPré (Illustrator)</p>
                    <p class="publication-info">Hardcover – September 1, 1998</p>
                    <p class="short-description">Another engaging book description. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident.</p>
                    <a href="#" class="view-book-button" aria-label="View details for Harry Potter and the Sorcerer's Stone">View Book</a>
                </div>
            </article>

            {{-- Example Search Result Item 3 --}}
            <article class="search-result-item">
                <img src="https://via.placeholder.com/120x180/AAAAAA/FFFFFF?text=Book" alt="Cover of Fantastic Beasts and Where to Find Them" class="result-book-cover">
                <div class="result-details">
                    <h3>Fantastic Beasts and Where to Find Them</h3>
                    <p class="author-info">by Newt Scamander (Author), J.K. Rowling (Introduction)</p>
                    <p class="publication-info">Paperback – March 1, 2001</p>
                    <p class="short-description">A magical guide to the creatures of the wizarding world. Sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    <a href="#" class="view-book-button" aria-label="View details for Fantastic Beasts and Where to Find Them">View Book</a>
                </div>
            </article>

            {{-- Example Search Result Item 4 --}}
            <article class="search-result-item">
                <img src="https://via.placeholder.com/120x180/AAAAAA/FFFFFF?text=Book" alt="Cover of Quidditch Through the Ages" class="result-book-cover">
                <div class="result-details">
                    <h3>Quidditch Through the Ages</h3>
                    <p class="author-info">by Kennilworthy Whisp (Author), J.K. Rowling (Introduction)</p>
                    <p class="publication-info">Paperback – October 1, 2001</p>
                    <p class="short-description">The definitive history of the wizarding world's favorite sport. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit.</p>
                    <a href="#" class="view-book-button" aria-label="View details for Quidditch Through the Ages">View Book</a>
                </div>
            </article>

            {{-- No Results Found State (Hidden by default, show with JavaScript/Blade conditional) --}}
            <div class="no-results-found" style="display: none;" role="alert">
                <p>No books found matching "<span id="no-results-query">your search query</span>".</p>
                <p>Try refining your search or explore our <a href="#">popular categories</a>.</p>
            </div>
        </section>

        {{-- Pagination --}}
        <nav class="pagination-section" aria-label="Search results pagination">
            <a href="#" class="pagination-arrow prev-page" aria-label="Previous page">&laquo; Previous</a>
            <ol class="page-numbers"> {{-- Use ordered list for pagination --}}
                <li><a href="#" class="page-number active" aria-current="page" aria-label="Page 1">1</a></li>
                <li><a href="#" class="page-number" aria-label="Page 2">2</a></li>
                <li><a href="#" class="page-number" aria-label="Page 3">3</a></li>
                <li class="ellipsis" aria-hidden="true">...</li>
                <li><a href="#" class="page-number" aria-label="Page 10">10</a></li>
            </ol>
            <a href="#" class="pagination-arrow next-page" aria-label="Next page">Next &raquo;</a>
        </nav>
    </main>

    @include('components.navigation.footer')

    <!-- <script>
        // Example JavaScript for filter/sort or showing no results
        document.addEventListener('DOMContentLoaded', function() {
            const genreFilter = document.getElementById('genre-filter');
            const ratingFilter = document.getElementById('rating-filter');
            const sortBy = document.getElementById('sort-by');
            const searchForm = document.querySelector('.main-search-form'); // Assuming main form controls the search

            // Function to update the URL with filter/sort parameters
            function updateSearchUrl() {
                const currentUrl = new URL(window.location.href);
                const query = currentUrl.searchParams.get('query') || '';
                const newUrl = new URL('{{ route('books.search') }}');

                newUrl.searchParams.set('query', query); // Keep the current search query

                if (genreFilter.value) {
                    newUrl.searchParams.set('genre', genreFilter.value);
                } else {
                    newUrl.searchParams.delete('genre');
                }

                if (ratingFilter.value) {
                    newUrl.searchParams.set('min_rating', ratingFilter.value);
                } else {
                    newUrl.searchParams.delete('min_rating');
                }

                if (sortBy.value && sortBy.value !== 'relevance') {
                    newUrl.searchParams.set('sort_by', sortBy.value);
                } else {
                    newUrl.searchParams.delete('sort_by');
                }

                window.location.href = newUrl.toString(); // Redirect to the new URL
            }

            // Add event listeners to filter/sort selects
            if (genreFilter) genreFilter.addEventListener('change', updateSearchUrl);
            if (ratingFilter) ratingFilter.addEventListener('change', updateSearchUrl);
            if (sortBy) sortBy.addEventListener('change', updateSearchUrl);

            // Set initial filter/sort values from URL parameters on page load
            const urlParams = new URLSearchParams(window.location.search);
            if (genreFilter) genreFilter.value = urlParams.get('genre') || '';
            if (ratingFilter) ratingFilter.value = urlParams.get('min_rating') || '';
            if (sortBy) sortBy.value = urlParams.get('sort_by') || 'relevance';

            // Example of how to show no results (this would typically be driven by backend data)
            // const searchResultsList = document.querySelector('.search-results-list');
            // const noResultsFound = document.querySelector('.no-results-found');
            // const currentQuery = urlParams.get('query');
            // if (searchResultsList.children.length === 0) { // Or check against actual data
            //     noResultsFound.style.display = 'block';
            //     document.getElementById('no-results-query').textContent = currentQuery || 'your search';
            // } else {
            //     noResultsFound.style.display = 'none';
            // }
        });
    </script> -->
</body>
</html>
