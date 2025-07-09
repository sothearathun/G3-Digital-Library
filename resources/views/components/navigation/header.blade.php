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
<form action="{{ route('processSearch') }}" method="GET" id="browse-form">
    <div class="mega-menu">
        <div class="genres">
            @foreach($v_genres as $genre)
                <label>
                    <input type="checkbox" name="book_genres[]" value="{{ $genre->genre_name }}">
                    {{ $genre->genre_name }}
                </label>
            @endforeach
        </div>
        <div class="side-menu">
            <label>
                <input type="radio" name="category" value="newly-added"> Newly Added
            </label>
            <label>
                <input type="radio" name="category" value="trending"> Trending
            </label>
            <label>
                <input type="radio" name="category" value="best-selling"> Best-Selling
            </label>
        </div>
        <button type="submit">Apply Filters</button>
    </div>
</form>
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
