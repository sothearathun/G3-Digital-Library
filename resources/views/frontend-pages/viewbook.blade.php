<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Detail Page</title>



    <!-- style sheet -->
    <link rel="stylesheet" href="{{ asset('css/web/viewbook.css') }}">
</head>
<body>

    <!-- header -->
    <x-navigation.header/>

    <div class="container">
        <a href="" class="back-button" onclick="history.back(); return false;">
            <span style="font-size: 20px;">← back</span>
        </a>

        <!-- about books: cover, author name, rating, etc -->
        <div class="book-detail">
            <div class="book-cover">
                <img src="{{ asset($book->book_cover) }}" alt="{{ $book->book_title }}">
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
                    <div class="rating-text">4.5 (2,341 reviews)</div>
                </div>
        
                <div class="book-stats">
                    <span>📖 {{ $book->total_pages }} pages</span>
                    <span>👁 Like</span>
                    <span>💾 Save</span>
                </div>
        <!-- about books: cover, author name, rating, etc -->



                <!-- actions -->
                <div class="action-buttons">
                    <button class="btn btn-primary" onclick="location.href=`{{ route('readbook', ['book_id' => $book->book_id]) }}`">Read now</button>
                    <button class="btn btn-secondary">Add to library</button>
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
                
                <div class="book-recommendations">
                    <div class="recommendation-item">
                        <img src="    " alt="Book 1" class="rec-book-cover">
                        <div class="rec-book-info">
                            <h4>The Hope Filled Life</h4>
                            <div class="rec-author">Rick Warren</div>
                            <div class="rec-rating">★★★★★</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        </div>


    <!-- comment section -->
    <x-books.comment-section/> 


    <!-- footer -->
    <x-navigation.footer/>
</body>
</html>
