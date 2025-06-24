// Redirect to search page when clicking on search input
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.querySelector('#main-search-input');
    
    if (searchInput) {
        searchInput.addEventListener('click', function() {
            window.location.href = '/search_page';
        });
    }
});