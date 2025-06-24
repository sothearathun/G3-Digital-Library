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

    <!-- login page -->
    <x-login_signup.log_sign/>

    
    <!-- Header page -->
    <x-navigation.header/>

    <div class="container">
        
    <!-- Hero Section Component -->
    <x-home.hero-section/>

    <br><br><br>
    
    <!-- Search Section Component -->
    <div id="search-section">
        <x-home.search-bar/>
    </div>



    <!-- Trending Books  -->
    <h2 class="section-header" style="font-size: 30px;">TRENDING BOOKS</h2>
    <x-home.book-carousel :books="$v_trending_books" />
    <!-- Trending Books  -->

    <!-- Best Selling Books -->
    <h2 class="section-header" style="font-size: 30px;">BEST SELLING BOOKS</h2>
    <x-home.book-carousel :books="$v_best_selling_books" />
    <!-- Best Selling Books -->

    <!-- Newly added book   -->
    <h2 class="section-header" style="font-size: 30px;">NEWLY ADDED BOOKS</h2>
    <x-home.book-carousel :books="$v_newly_added_books" />
    <!-- Newly added book   -->



        <!-- Authors Section Component -->
        <h2 class="section-header" style="font-size: 30px;">POPULAR AUTHORS OF THE YEAR</h2>
        <div class="popular-authors">
            <x-home.popular-author :authors="$v_popular_authors"/>
        </div>



        
        <!-- News Section Component -->
                    <!-- dont see any cover img for news in the DB, so will have to talk with my team leader regarding this  -->
        <h2 class="section-header" style="font-size: 30px;">DIGITALES NEWS</h2>
        <div class="digitales-news">
            <x-home.news-section :news="$v_digitales_news"/>
        </div>
    </div>

    <!-- footer page -->
    <x-navigation.footer/>


    <!-- js for swiping book functions -->
    <script src="{{ asset('js/web/homepage.js') }}"></script>
</body>
</html>
