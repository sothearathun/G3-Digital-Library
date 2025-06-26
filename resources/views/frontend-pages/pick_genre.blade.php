


<!-- after the loging/signup form, it needed to be redirected here. after these we go homepage -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DIGITALES - Discover Your Next Favorite Read</title>

    <!-- style sheet -->
     <link rel="stylesheet" href="{{ asset('css/web/pick_genre.css') }}">
</head>
<body>

    <!-- header -->
    <x-navigation.header/>


    <div class="bg-particles" id="particles"></div>


    <main class="main-content">
        <section class="hero-section">
            <h1 class="hero-title">Discover Your Next Adventure</h1>
            <p class="hero-subtitle">Personalized book recommendations powered by your favorite genres</p>
        </section>

        <div class="genre-card">
            <h2 class="card-title">Follow Your Favorite Genre</h2>
            <p class="card-subtitle">We use your favorite genres to make better book recommendations and make sure you see more of them.</p>
            
            <div class="genre-grid" id="genreGrid">
                <div class="genre-item" data-genre="art">
                    <a href="#" style="color: #fff; text-decoration: none;">Art</a>
                </div>
                <div class="genre-item" data-genre="art">
                    <a href="#" style="color: #fff; text-decoration: none;">Art</a>
                </div>
                <div class="genre-item" data-genre="art">
                    <a href="#" style="color: #fff; text-decoration: none;">Art</a>
                </div>
                <div class="genre-item" data-genre="art">
                    <a href="#" style="color: #fff; text-decoration: none;">Action fantasy</a>
                </div>
                <div class="genre-item" data-genre="art">
                    <a href="#" style="color: #fff; text-decoration: none;">Action </a>
                </div>
                <div class="genre-item" data-genre="art">
                    <a href="#" style="color: #fff; text-decoration: none;">Art</a>
                </div>
                <div class="genre-item" data-genre="art">
                    <a href="#" style="color: #fff; text-decoration: none;">Art</a>
                </div>
                <div class="genre-item" data-genre="art">
                    <a href="#" style="color: #fff; text-decoration: none;">Art</a>
                </div>
                <div class="genre-item" data-genre="art">
                    <a href="#" style="color: #fff; text-decoration: none;">Art</a>
                </div>
                <div class="genre-item" data-genre="art">
                    <a href="#" style="color: #fff; text-decoration: none;">Art</a>
                </div>
                <div class="genre-item" data-genre="art">
                    <a href="#" style="color: #fff; text-decoration: none;">Art</a>
                </div>
                <div class="genre-item" data-genre="art">
                    <a href="#" style="color: #fff; text-decoration: none;">Art</a>
                </div>
                <div class="genre-item" data-genre="art">
                    <a href="#" style="color: #fff; text-decoration: none;">Art</a>
                </div>
                <div class="genre-item" data-genre="art">
                    <a href="#" style="color: #fff; text-decoration: none;">Art</a>
                </div>
                <div class="genre-item" data-genre="art">
                    <a href="#" style="color: #fff; text-decoration: none;">Art</a>
                </div>
                <div class="genre-item" data-genre="art">
                    <a href="#" style="color: #fff; text-decoration: none;">Art</a>
                </div>
                <div class="genre-item" data-genre="art">
                    <a href="#" style="color: #fff; text-decoration: none;">Art</a>
                </div>
                <div class="genre-item" data-genre="art">
                    <a href="#" style="color: #fff; text-decoration: none;">Art</a>
                </div>
                <div class="genre-item" data-genre="art">
                    <a href="#" style="color: #fff; text-decoration: none;">Art</a>
                </div>
                <div class="genre-item" data-genre="art">
                    <a href="#" style="color: #fff; text-decoration: none;">Art</a>
                </div>
            </div>

            <div class="action-buttons">
                <button class="btn btn-primary" id="saveBtn">
                    <a href="http://127.0.0.1:8000/homepage" style="color: #fff; text-decoration: none;">Save</a>
                </button>
                <button class="btn btn-secondary" id="laterBtn">
                    <a href="http://127.0.0.1:8000/homepage" style="color: #fff; text-decoration: none;">
                        I'll come back later
                    </a>
                </button>
            </div>
        </div>

    </main>


    <!-- footer -->
    <x-navigation.footer/>

    <!-- js sheet -->
    <script src="{{ asset('js/pick_genre.js') }}"></script>

</body>
</html>
