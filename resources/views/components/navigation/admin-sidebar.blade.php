<!-- filepath: c:\wamp64\www\PHP_paragon_y2\Mission1-G3-Digital Library\Admin-Digital-Library\resources\views\components\navigation\admin-sidebar.blade.php -->
<link rel="stylesheet" href="{{ asset('css/admin/sidebar.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

<div class="sidebar">
    <h2><i class="fa-solid fa-book-open-reader"></i> DIGITALES Admin</h2>
    <ul>
      <li><a href="{{ route('Analytics') }}"><i class="fa-solid fa-chart-pie"></i> Analytics</a></li>
      <li><a href="{{ route('Statistics') }}"><i class="fa-solid fa-chart-line"></i> Book Statistics</a></li>
      <li><a href="{{ route('Authors') }}"><i class="fa-solid fa-user-pen"></i> Authors</a></li>
      <li><a href="{{ route('publishBookForm') }}"><i class="fa-solid fa-upload"></i> Publish Books</a></li>
      <li><a href="{{ route('BooksPublished') }}"><i class="fa-solid fa-book"></i> Books Published</a></li>
      <li><a href="{{ route('DigitalesNews') }}"><i class="fa-solid fa-newspaper"></i> Digital News</a></li>
      <li><a href="{{ route('Guidelines') }}"><i class="fa-solid fa-lightbulb"></i> Guidelines</a></li>

       <li>
        <form method="POST" action="{{ route('logout') }}" style="display: inline">
          @csrf
          <button type="submit" class="logout-btn">
            <i class="fa-solid fa-right-from-bracket"></i> Logout
          </button>
        </form>
      </li>

    </ul>
</div>