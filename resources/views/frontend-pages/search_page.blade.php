<!-- resources/views/frontend-pages/homepage.blade.php -->

@extends('layouts.app')

@section('title', 'Digitales - Homepage')

@section('content')


    {{-- Search Page Content --}}
    <main class="container search-page-wrapper">

    {{--  Search Bar --}}
    <x-home.search-bar/>


    <br>

        <!-- {{-- Suggested Searches / Popular Searches --}} -->
        <section class="suggested-searches-section">
            <h2 class="section-subtitle">Suggested Searches:</h2>
            <div class="suggested-tags">
                
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

@endsection
