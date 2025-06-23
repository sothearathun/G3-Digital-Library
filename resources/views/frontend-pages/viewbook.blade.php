<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Detail Page</title>



    <!-- style sheet -->
    <link rel="stylesheet" href="{{ asset('css/viewbook.css') }}">
</head>
<body>

    <!-- header -->
    <x-navigation.header/>

    <div class="container">
        <a href="homepage" class="back-button">
            ← back
        </a>

        <!-- about books: cover, author name, rating, etc -->
        <div class="book-detail">
            <div class="book-cover">
                <img src="{{ asset($book->cover_image) }}" alt="{{ $book->book_title }} Cover">
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
                    <span>📖 {{ $book->page_count }} pages</span>
                    <span>👁 Like</span>
                    <span>💾 Save</span>
                </div>
        <!-- about books: cover, author name, rating, etc -->



                <!-- actions -->
                <div class="action-buttons">
                    <button class="btn btn-primary">Read now</button>
                    <button class="btn btn-secondary">Add to library</button>
                </div>
                <!-- actions -->
            </div>
        </div>

        <div class="divider">❦ ❦ ❦</div>

        <div class="related-books">
            <h3>Best Paperback Online Book Author Rick Warren Collection Online Best Collection Online</h3>
            
            <div class="book-recommendations">
                <div class="recommendation-item">
                    <img src="    " alt="Book 1" class="rec-book-cover">
                    <div class="rec-book-info">
                        <h4>The Hope Filled Life</h4>
                        <div class="rec-author">Rick Warren</div>
                        <div class="rec-rating">★★★★★</div>
                    </div>
                </div>

                <div class="recommendation-item">
                    <img src="    " alt="Book 2" class="rec-book-cover">
                    <div class="rec-book-info">
                        <h4>Daily Hope</h4>
                        <div class="rec-author">Rick Warren</div>
                        <div class="rec-rating">★★★★★</div>
                    </div>
                </div>
            </div>

            <div class="tags">
                <span class="tag">Dreams</span>
                <span class="tag">Goals</span>
                <span class="tag">Habits</span>
                <span class="tag">Hope</span>
                <span class="tag">Faith</span>
            </div>

            <div class="about-author">
                <strong>About author:</strong> author bio
            </div>
        </div>

        <div class="comments-section">
            <div class="comments-header">
                <h3>6 Comments</h3>
            </div>

            <div class="comment">
                <div class="comment-avatar">A</div>
                <div class="comment-content">
                    <div class="comment-author">Anonymous User</div>
                    <div class="comment-text">Good book overall but some parts were little drawn out and repetitive.</div>
                    <div class="comment-meta">2 days ago • 👍 5 likes</div>
                </div>
            </div>

            <div class="comment">
                <div class="comment-avatar">B</div>
                <div class="comment-content">
                    <div class="comment-author">Book Lover</div>
                    <div class="comment-text">Excellent read! Really helped me find direction in life. Highly recommend to anyone feeling lost.</div>
                    <div class="comment-meta">5 days ago • 👍 12 likes</div>
                </div>
            </div>

            <div class="comment">
                <div class="comment-avatar">C</div>
                <div class="comment-content">
                    <div class="comment-author">Critical Reader</div>
                    <div class="comment-text">The book has good insights but could have been shorter. Some chapters felt repetitive.</div>
                    <div class="comment-meta">1 week ago • 👍 3 likes</div>
                </div>
            </div>

            <div class="comment">
                <div class="comment-avatar">D</div>
                <div class="comment-content">
                    <div class="comment-author">Spiritual Seeker</div>
                    <div class="comment-text">This book changed my perspective on life and faith. Warren's writing is clear and practical.</div>
                    <div class="comment-meta">2 weeks ago • 👍 8 likes</div>
                </div>
            </div>

            <div class="comment">
                <div class="comment-avatar">E</div>
                <div class="comment-content">
                    <div class="comment-author">First Time Reader</div>
                    <div class="comment-text">Good introduction to purpose-driven living. Easy to understand and apply.</div>
                    <div class="comment-meta">3 weeks ago • 👍 6 likes</div>
                </div>
            </div>

            <div class="comment">
                <div class="comment-avatar">F</div>
                <div class="comment-content">
                    <div class="comment-author">Long Time Fan</div>
                    <div class="comment-text">Rick Warren's best work in my opinion. Life-changing content delivered in an accessible way.</div>
                    <div class="comment-meta">1 month ago • 👍 15 likes</div>
                </div>
            </div>
        </div>
    </div>


    <!-- footer -->
    <x-navigation.footer/>
</body>
</html>
