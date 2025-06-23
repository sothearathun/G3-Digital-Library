<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digitales - Homepage</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    


    <!-- css sheet -->
    <link rel="stylesheet" href="{{ asset('css/css_homepage.css') }}">
    
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
                <img src="{{ asset('uploads/hero_image/hero_image.jpg') }}" alt="">
                <small>Image credits: Wikimedia Commons</small>
            </div>
        </section>

<br><br><br>
        <!-- search bar -->
        <x-navigation.search/>



        <!-- Trending Books  -->
        <h2 class="section-header">TRENDING BOOKS</h2>
        <div class="book-carousel-container">
            <div class="book-carousel">
                <div class="book-carousel-track" id="bookCarouselTrack">

                    

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
                <div class="book-carousel-track" id="bookCarouselTrack">

                    
                </div>
            </div>

            <!-- button for swipe -->
            <button class="carousel-nav prev" onclick="previousSlide()">❮</button>
            <button class="carousel-nav next" onclick="nextSlide()">❯</button>
            
            <div class="carousel-indicators" id="carouselIndicators"></div>
        </div>
        <!-- Newly Added Books for you   -->
        
        <!-- ill have to rework so it show book based on upload time/date -->
        <!-- Newly added book   -->
        <h2 class="section-header">NEWLY ADDED BOOKS</h2>
        <div class="book-carousel-container">
            <div class="book-carousel">
                <div class="book-carousel-track" id="bookCarouselTrack">


                    
                </div>
            </div>

            <!-- button for swipe -->
            <button class="carousel-nav prev" onclick="previousSlide()">❮</button>
            <button class="carousel-nav next" onclick="nextSlide()">❯</button>
            
            <div class="carousel-indicators" id="carouselIndicators"></div>
        </div>
        <!-- Newly added book   -->



        <!-- Authors Section Component -->
        <h2 class="section-header">POPULAR AUTHORS OF THE YEAR</h2>
        <div class="popular-authors">


        </div>



        
        <!-- News Section Component -->
                    <!-- dont see any cover img for news in the DB, so will have to talk with my team leader regarding this  -->
        <h2 class="section-header">DIGITALES NEWS</h2>
        <div class="digitales-news">
            
        </div>
    </div>

    <!-- footer page -->
    <x-navigation.footer/>


    <!-- js for swiping book functions -->
    <script src="{{ asset('js/homepage.js') }}"></script>
</body>
</html>
