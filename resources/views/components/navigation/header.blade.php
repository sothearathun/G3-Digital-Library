<link rel="stylesheet" href="{{ asset('css/web/header.css') }}">

<header>
    <div class="header-content">
        <a href="{{ route('homepage') }}" class="logo">DIGITALES</a>
        <nav>
            <ul>
                <li><a href="{{ route('aboutus') }}">About</a></li>

                <!-- drop down menu -->
                <li class="dropdown">
                    <a href="#">Browse</a>
                    <div class="mega-menu">
                        <div class="genres">

                            <!-- do i have to get genre from db? -->
                            <a href="#">Fantasy</a><a href="#">Science Fiction</a><a href="#">Romance</a>
                            <a href="#">Historical</a><a href="#">Mystery</a><a href="#">Horror</a>
                            <a href="#">Adventure</a><a href="#">Thriller</a><a href="#">Drama</a>
                            <a href="#">Fantasy</a><a href="#">Science Fiction</a><a href="#">Romance</a>
                            
                        </div>
                        <div class="side-menu">
                            <p>Article</p>  
                            <p>Newly Added</p>
                            <p>Trending</p>
                            <p>Author Quotes</p>
                        </div>
                    </div>
                </li>
                <!-- drop down menu -->
                 
                <li><a href="#">Mode</a></li>
            </ul>
        </nav>

       <div class="profile-icon">
            <i class="fa-solid fa-user"></i>

            @guest
                <a href="{{ route('login') }}" class="guest-login">login/signup</a>
            @endguest

            @auth
                <p class="profile-greeting">Hello, {{ Auth::user()->name }}</p>
                <x-home.profile-menu/>
            @endauth
        </div>

    </div>
</header>
