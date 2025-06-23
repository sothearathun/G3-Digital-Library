

        {{--  Search Bar --}}
        <section class="main-search-section">
            <h1 class="visually-hidden">Book Search</h1> {{-- Hidden heading for accessibility --}}
            <form action="{{ route('books.search') }}" method="GET" class="main-search-form" role="search">
                <label for="main-search-input" class="visually-hidden">Search for books, authors, genres</label>
                <input type="text" id="main-search-input" name="query" placeholder="Explore Your Fantasy" aria-label="Search for books, authors, or genres" value="{{ request('query') }}">
                <button type="submit" class="search-icon-button" aria-label="Perform search">
                    <i class="fas fa-search" aria-hidden="true"></i>
                </button>
            </form>
        </section>

<style>
/* Main Search Section (at the top of the search page) */
.main-search-section {
    text-align: center;
    margin-bottom: 50px; /* Space below the search section */
}

.main-search-form {
    display: flex; /* Use flex for aligning input and button */
    width: 100%;
    max-width: 700px; /* Wider search bar */
    border: 1px solid var(--border-color); /* Uses a CSS variable for consistency */
    border-radius: 30px; /* More rounded corners */
    overflow: hidden; /* Ensures content stays within rounded borders */
    box-shadow: 0 4px 15px var(--shadow-medium); /* Soft shadow for depth */
    background-color: #fff; /* White background for the form */
    margin: 0 auto; /* Centers the form horizontally */
}

.main-search-form input[type="text"] {
    border: none; /* Removes default input border */
    padding: 15px 25px; /* Ample padding inside the input */
    flex-grow: 1; /* Allows the input to take up available space */
    outline: none; /* Removes outline on focus */
    font-size: 1.15em; /* Slightly larger text for better readability */
    color: var(--primary-color); /* Text color, using a CSS variable */
    background-color: transparent; /* Transparent background */
    font-family: 'Open Sans', sans-serif; /* Consistent font family */
}

.main-search-form input[type="text"]::placeholder {
    color: var(--dark-grey); /* Placeholder text color */
    opacity: 0.8; /* Slightly faded placeholder */
}

.main-search-form .search-icon-button {
    background-color: var(--medium-grey); /* Background color for the button */
    border: none; /* Removes button border */
    padding: 15px 25px; /* Padding inside the button */
    cursor: pointer; /* Indicates it's clickable */
    font-size: 1.3em; /* Larger icon size */
    color: var(--secondary-color); /* Icon color */
    transition: background-color 0.3s ease, color 0.3s ease; /* Smooth transition for hover effects */
    display: flex; /* Use flex to center the icon */
    align-items: center; /* Vertically center the icon */
    justify-content: center; /* Horizontally center the icon */
}

.main-search-form .search-icon-button:hover {
    background-color: var(--dark-grey); /* Darker background on hover */
    color: #fff; /* White icon on hover */
}

/* Decorative Line Breaks specific to this section */
.small-scroll-divider {
    width: 180px; /* Width of the divider */
    height: 25px; /* Height of the divider (determines SVG visibility) */
    margin: 30px auto; /* Centers the divider and provides vertical spacing */
    /* Inherits general styles from .decorative-line-break (defined in global.css) */
}

/* Responsive Adjustments for the main search section */
@media (max-width: 768px) {
    .main-search-form {
        flex-direction: column; /* Stack search input and button vertically */
        border-radius: 10px; /* Adjust border-radius for stacked layout */
        max-width: 90%; /* Make the form slightly narrower on smaller screens */
    }

    .main-search-form input[type="text"] {
        padding: 12px 20px; /* Slightly less padding */
        font-size: 1em; /* Smaller text size */
        border-bottom: 1px solid var(--border-color); /* Add a separator between input and button */
    }

    .main-search-form .search-icon-button {
        width: 100%; /* Make button full width when stacked */
        padding: 12px 20px; /* Slightly less padding */
        border-radius: 0 0 10px 10px; /* Only round bottom corners when stacked */
        font-size: 1.1em; /* Slightly smaller icon */
    }
}

@media (max-width: 480px) {
    .main-search-form {
        max-width: 100%; /* Allow form to take full width on very small screens */
    }
}

/* Ensure these CSS variables are defined in your global.css or a common stylesheet */

:root {
    --primary-color: #333;
    --secondary-color: #555;
    --dark-grey: #666;
    --medium-grey: #e0e0e0;
    --border-color: #ccc;
    --shadow-medium: rgba(0,0,0,0.1);
}

.visually-hidden {
    position: absolute;
    width: 1px;
    height: 1px;
    margin: -1px;
    padding: 0;
    overflow: hidden;
    clip: rect(0, 0, 0, 0);
    border: 0;
}

.decorative-line-break {
    background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 20"><path fill="none" stroke="%23999" stroke-width="1" d="M0,10 C20,0 30,20 50,10 C70,0 80,20 100,10" /></svg>');
    background-size: contain;
    background-repeat: no-repeat;
    background-position: center;
    content: '';
    display: block;
    opacity: 0.7;
}

</style>
