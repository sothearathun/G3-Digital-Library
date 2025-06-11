<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digitales - Homepage</title>
    <link rel="stylesheet" href="{{ asset('css/css_homepage.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
</head>
<body>

    <!-- header page -->
    @include('Header_Footer.header')

    <div class="container">
        <section class="hero-section">
            <div class="hero-quote">
                <strong>"Nothing contributes so much to tranquillize the mind as a steady purpose — a point on which the soul may fix its intellectual eye."</strong>
                <small>— Mary Wollstonecraft Shelley (1797-1851)</small>
                <a href="#" class="explore-button">Explore New Fantasy</a>
            </div>
            <div class="hero-image">
                <img src="https://via.placeholder.com/300x400/CCCCCC/888888?text=Book+Image" alt="Book Cover">
                <small>Image credits: Wikimedia Commons</small>
            </div>
        </section>

         {{-- SEARCH BAR SECTION --}}
        <section class="search-bar-section">
            <form action="{{ route('books.search') }}" method="GET" class="search-form"> 
                <input type="text" name="query" placeholder="Search for books, authors, or genres..." aria-label="Search">
                <button type="submit">Search</button>
            </form>
        </section>
        {{-- SEARCH BAR SECTION --}} 

        <h2 class="section-header">TRENDING BOOKS</h2>
        <div class="book-shelf">
            <div class="book-item">
                <img src="https://via.placeholder.com/100x150/AAAAAA/FFFFFF?text=Book" alt="Book Cover">
                <div class="book-details">
                    <h3>Book title</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    <div class="book-meta">
                        <span>⭐ 4.5</span>
                        <span>❤️ 120</span>
                        <span>💬 30</span>
                        <span>📖 500 pages</span>
                    </div>
                </div>
            </div>
            <div class="book-item">
                <img src="https://via.placeholder.com/100x150/AAAAAA/FFFFFF?text=Book" alt="Book Cover">
                <div class="book-details">
                    <h3>Book title</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    <div class="book-meta">
                        <span>⭐ 4.2</span>
                        <span>❤️ 95</span>
                        <span>💬 25</span>
                        <span>📖 480 pages</span>
                    </div>
                </div>
            </div>
        </div>

        <h2 class="section-header">RECOMMENDED FOR YOU</h2>
        <div class="book-shelf">
            <div class="book-item">
                <img src="https://via.placeholder.com/100x150/AAAAAA/FFFFFF?text=Book" alt="Book Cover">
                <div class="book-details">
                    <h3>Book title</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    <div class="book-meta">
                        <span>⭐ 4.0</span>
                        <span>❤️ 80</span>
                        <span>💬 20</span>
                        <span>📖 450 pages</span>
                    </div>
                </div>
            </div>
            <div class="book-item">
                <img src="https://via.placeholder.com/100x150/AAAAAA/FFFFFF?text=Book" alt="Book Cover">
                <div class="book-details">
                    <h3>Book title</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    <div class="book-meta">
                        <span>⭐ 4.7</span>
                        <span>❤️ 150</span>
                        <span>💬 40</span>
                        <span>📖 520 pages</span>
                    </div>
                </div>
            </div>
        </div>

        <h2 class="section-header">NEWLY ADDED BOOK</h2>
        <div class="book-shelf">
            <div class="book-item">
                <img src="https://via.placeholder.com/100x150/AAAAAA/FFFFFF?text=Book" alt="Book Cover">
                <div class="book-details">
                    <h3>Book title</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    <div class="book-meta">
                        <span>⭐ 4.8</span>
                        <span>❤️ 180</span>
                        <span>💬 50</span>
                        <span>📖 550 pages</span>
                    </div>
                </div>
            </div>
            <div class="book-item">
                <img src="https://via.placeholder.com/100x150/AAAAAA/FFFFFF?text=Book" alt="Book Cover">
                <div class="book-details">
                    <h3>Book title</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    <div class="book-meta">
                        <span>⭐ 4.3</span>
                        <span>❤️ 100</span>
                        <span>💬 28</span>
                        <span>📖 470 pages</span>
                    </div>
                </div>
            </div>
        </div>

        <h2 class="section-header">POPULAR AUTHORS OF THE YEAR</h2>
        <div class="popular-authors">
            <div class="author-card">
                <img src="https://via.placeholder.com/150x150/CCCCCC/888888?text=J.K.Rowling" alt="Author Image">
                <p>J.K. Rowling</p>
            </div>
            <div class="author-card">
                <img src="https://via.placeholder.com/150x150/CCCCCC/888888?text=J.K.Rowling" alt="Author Image">
                <p>J.K. Rowling</p>
            </div>
            <div class="author-card">
                <img src="https://via.placeholder.com/150x150/CCCCCC/888888?text=J.K.Rowling" alt="Author Image">
                <p>J.K. Rowling</p>
            </div>
        </div>

        <h2 class="section-header">DIGITALES NEWS</h2>
        <div class="digitales-news">
            <div class="news-card">
                <img src="https://via.placeholder.com/300x200/BBBBBB/FFFFFF?text=News+Image" alt="News Image">
                <h4>News Title Goes Here</h4>
                <p>Short description of the news article, enticing readers to click and learn more.</p>
            </div>
            <div class="news-card">
                <img src="https://via.placeholder.com/300x200/BBBBBB/FFFFFF?text=News+Image" alt="News Image">
                <h4>Another News Title</h4>
                <p>Brief summary of this exciting news, encouraging further reading.</p>
            </div>
            <div class="news-card">
                <img src="https://via.placeholder.com/300x200/BBBBBB/FFFFFF?text=News+Image" alt="News Image">
                <h4>Latest Updates</h4>
                <p>A snippet about the latest developments in the world of digital books.</p>
            </div>
        </div>
    </div>

    <!-- Footer page -->
     @include('Header_Footer.footer') 

</body>
</html>