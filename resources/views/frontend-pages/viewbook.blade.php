<!-- resources/views/frontend-pages/homepage.blade.php -->

@extends('layouts.app')

@section('title', 'Digitales - Homepage')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/web/viewbook.css') }}">
@endpush

@section('content')

    <div class="container">
        <a href="" class="back-button" onclick="history.back(); return false;">
            <span style="font-size: 20px;">← back</span>
        </a>

        <!-- about books: cover, author name, rating, etc -->
        <div class="book-detail">
            <div class="book-cover">
                <img src="{{ asset('uploads/' . $book->book_cover) }}" alt="{{ $book->book_title }} Cover">
            </div>

            <div class="book-info">
                <h1>{{ $book->book_title }}</h1>
                <div class="author">Author Name: {{ $book->author_name }}</div>
                
                <div class="book-description">
                    {{ $book->description }}
                </div>

                <div class="book-meta">
                    <div class="publication-date">Published {{ \Carbon\Carbon::parse($book->released_date)->format('j F Y') }}</div>
                    <div class="genre-tag">{{ $book->book_categories }}</div>
                </div>

                <div class="rating">
                    <div class="stars">★★★★★</div>
                    <div class="rating-text">N/A (N/A reviews)</div>
                </div>
        
                <div class="book-stats">
                    <span>📖 {{ $book->total_pages }} pages</span>
                    <span>💾 (N/A) added to favorite</span>
                </div>
        <!-- about books: cover, author name, rating, etc -->



                <!-- actions -->
                <div class="action-buttons">
                    <button class="btn btn-primary" onclick="location.href=`{{ route('readbook', ['book_id' => $book->book_id]) }}`">Read now</button>

                    <form action="{{ route('addfavorite', ['book_id' => $book->book_id]) }}" method="POST">
                        @csrf
                        @if(DB::table('book_favorites')->where('book_id', $book->book_id)->where('user_id', auth()->id())->exists())
                            <button class="btn btn-secondary">Added to Favorites</button>
                        @else
                            <button class="btn btn-secondary">Add to Favorites</button>
                        @endif
                    </form>
                </div>
                <!-- actions -->
            </div>
        </div>

        <div class="divider">❦ ❦ ❦</div>


        <div class="under-divider">
            <div class="book-relevant-info">

                <div class="prologue">
                    <strong>Prologue:</strong> {{ $book->prologue }}
                </div>

                <div class="genres">
                        <strong>Book Genres:</strong><span class="tag">{{$book->book_genres}}</span>
                </div>

                <div class="about-author">
                    <strong>About author:</strong><a href="{{ $book->author_bio_link }}" target="_blank">{{ $book->author_name }}</a>
                </div>
            </div>


            <div class="related-books">
                <h3>More from {{ $book->author_name }}</h3>
                
                @foreach ($relatedBooks as $relatedBook)
                <div class="book-recommendations">
                    <div class="recommendation-item">
                        <img src="{{ asset('uploads/' . $relatedBook->book_cover) }}" class="rec-book-cover">
                        <div class="rec-book-info">
                            <h4>{{ $relatedBook->book_title }}</h4>
                            <div class="rec-author">{{ $relatedBook->author_name }}</div>
                            <div class="rec-rating">N/A</div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>


        </div>


    <!-- comment section -->
    <x-books.ratings-comments :book="$book" :comments="$comments" averageRating="{{ $averageRating }}" totalRatings="{{ $totalRatings }}"/>

@endsection