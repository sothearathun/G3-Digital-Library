<!-- sidebar.blade.php -->
<link rel="stylesheet" href="{{ asset('css/admin/sidebar.css') }}">
<script src="{{ asset('js/sidebar.js') }}"></script>

<div class="sidebar">
    <h2>DIGITALES admin</h2>
    <ul>
      <li><a href="{{ route('Analytics') }}">📊 Analytics</a></li>
      <li><a href="{{ route('publishBookForm') }}">🚀 Publish Books</a></li>
      <li><a href="{{ route('BooksPublished') }}">✅ Books Published</a></li>
      <li><a href="{{ route('Authors') }}">🧑 Authors</a></li>
      <li><a href="{{ route('DigitalesNews') }}">📰 Digital News</a></li>
      <li><a href="{{ route('UsersRecords') }}">📝 Users Records</a></li>
      <li><a href="{{ route('Statistics') }}">📈 Book Statistics</a></li>
      <li><a href="{{ route('Guidelines') }}">💡 Guidelines</a></li>
    </ul>
  </div>