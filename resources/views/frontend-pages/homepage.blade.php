<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digitales - Homepage</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    


    <!-- css sheet -->
    <link rel="stylesheet" href="{{ asset('css/web/css_homepage.css') }}">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700&family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">



</head>
<body>

    <!-- Header page -->
    <x-navigation.header/>

    <div class="container">
        <!-- Hero Section Component -->
        <section class="hero-section">
            <div class="hero-quote">
                <strong>"Nothing contributes so much to tranquillize the mind as a steady purpose — a point on which the soul may fix its intellectual eye."</strong>
                <small>— Mary Wollstonecraft Shelley (1797-1851)</small>
                <a href="" class="explore-button">Explore New Fantasy</a>
            </div>
            <div class="hero-image">
                @if(isset($v_TrendingBook[0]))
                    <img src="{{ asset($v_TrendingBook[0]->cover_image) }}" alt="Book Cover">
                @else
                    <img src="" alt="Book Cover">
                @endif
                <small>Image credits: Wikimedia Commons</small>
            </div>
        </section>

<br><br><br>
        <!-- search bar -->
            @include('components.navigation.search')



        <!-- Trending Books  -->
        <h2 class="section-header">TRENDING BOOKS</h2>
        <div class="book-carousel-container">
            <div class="book-carousel">
                <div class="book-carousel-track" id="bookCarouselTrack">


                    <!-- begin of Book loops-->
                    @foreach($v_TrendingBook as $tb) 
                    <div class="book-item">
                        <a href="{{ url('viewbook?id=' . $tb->book_id) }}">
                            <img src="{{ asset($tb->cover_image) }}" alt="Book Cover">
                        </a>
                        
                        <div class="book-details">
                            <h3>{{$tb->book_title}}</h3>
                            <p>{{$tb->description}}</p>
                            <div class="book-meta">
                                 <span>⭐ 4.5</span>             <!--not sure which table to get data from yet -->
                                <span>❤️ 120</span>              <!--not sure which table to get data from yet -->
                                <span>💬 30</span>               <!--not sure which table to get data from yet -->
                                <span>📖 {{$tb->page_count}}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!-- end of Book loops-->
                    
                </div>
            </div>

            <!-- button for swipe -->
            <button class="carousel-nav prev" onclick="previousSlide()">❮</button>
            <button class="carousel-nav next" onclick="nextSlide()">❯</button>
            
            <div class="carousel-indicators" id="carouselIndicators"></div>
        </div>
        <!-- Trending Books  -->


        <!-- ill have to rework so it match the user fav genre -->
        <!-- Books Recommanded for you   -->
<h2 class="section-header">BOOKS RECOMMENDED FOR YOU</h2>
<div class="book-carousel-container">
    <div class="book-carousel">
        <div class="book-carousel-track" id="bookCarouselTrackRecommended">
            @foreach($v_TrendingBook as $tb) 
            <div class="book-item">
                <a href="{{ url('viewbook?id=' . $tb->book_id) }}">
                    <img src="{{ asset($tb->cover_image) }}" alt="Book Cover">
                </a>
                <div class="book-details">
                    <h3>{{$tb->book_title}}</h3>
                    <p>{{$tb->description}}</p>
                    <div class="book-meta">
                        <span>⭐ 4.5</span>
                        <span>❤️ 120</span>
                        <span>💬 30</span>
                        <span>📖 {{$tb->page_count}}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <button class="carousel-nav prev" onclick="previousSlide('recommended')">❮</button>
    <button class="carousel-nav next" onclick="nextSlide('recommended')">❯</button>
    <div class="carousel-indicators" id="carouselIndicatorsRecommended"></div>
</div>

        <!-- Newly Added Books for you   -->
        
        <!-- ill have to rework so it show book based on upload time/date -->
        <!-- Newly added book   -->
<h2 class="section-header">NEWLY ADDED BOOKS</h2>
<div class="book-carousel-container">
    <div class="book-carousel">
        <div class="book-carousel-track" id="bookCarouselTrackNew">
            @foreach($v_TrendingBook as $tb) 
            <div class="book-item">
                <a href="{{ url('viewbook?id=' . $tb->book_id) }}">
                    <img src="{{ asset($tb->cover_image) }}" alt="Book Cover">
                </a>
                <div class="book-details">
                    <h3>{{$tb->book_title}}</h3>
                    <p>{{$tb->description}}</p>
                    <div class="book-meta">
                        <span>⭐ 4.5</span>
                        <span>❤️ 120</span>
                        <span>💬 30</span>
                        <span>📖 {{$tb->page_count}}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <button class="carousel-nav prev" onclick="previousSlide('new')">❮</button>
    <button class="carousel-nav next" onclick="nextSlide('new')">❯</button>
    <div class="carousel-indicators" id="carouselIndicatorsNew"></div>
</div>

        <!-- Newly added book   -->



        <!-- Authors Section Component -->
        <h2 class="section-header">POPULAR AUTHORS OF THE YEAR</h2>
        <div class="popular-authors">

        
            @foreach ($v_authors as $v_a)
            <!-- looping for author profile and name -->
            <div class="author-card">
                <img src="{{ asset ($v_a->profile_picture) }}" alt="Author Image">
                <p class="d_mode">{{$v_a->author_name}}</p>
            </div>
            <!-- looping for author profile and name -->
            @endforeach

            <!-- will have to figure out how to display only popular author -->
        </div>



        
        <!-- News Section Component -->
                    <!-- dont see any cover img for news in the DB, so will have to talk with my team leader regarding this  -->
        <h2 class="section-header">DIGITALES NEWS</h2>
        <div class="digitales-news">
            <div class="news-card">
                <img src="" alt="News Image">
                <h4>The Future of Digital Reading</h4>
                <p>Explore how AI and immersive technologies are revolutionizing the way we experience books.</p>
            </div>
            <div class="news-card">
                <img src="" alt="News Image">
                <h4>Best Sellers of 2025</h4>
                <p>Discover the most popular books that have captured readers' hearts this year.</p>
            </div>
            <div class="news-card">
                <img src="" alt="News Image">
                <h4>Author Spotlight Series</h4>
                <p>Meet the rising stars in contemporary literature and learn about their creative journey.</p>
            </div>
        </div>
    </div>

    <!-- footer page -->
    <x-navigation.footer/>


    <!-- js for swiping book functions -->
    <script src="{{ asset('js/homepage.js') }}"></script>
</body>
</html>
