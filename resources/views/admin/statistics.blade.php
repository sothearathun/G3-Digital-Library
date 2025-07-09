<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>DIGITALES Admin Dashboard</title>
  <link rel="stylesheet" href="{{ asset('css/admin/statistics.css') }}"> 
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>

<x-navigation.admin-sidebar/>

   <div class="content">
    <h2>
      <i class="fa-solid fa-book"></i>
    Book Statistics</h2>
    <table class="book-table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Cover</th>
          <th>Titles</th>
          <th>Avg. Ratings</th>
          <th>Total Favs</th>
          <th>Total Reading</th>
          <th>Comments</th>
        </tr>
      </thead>
      <tbody>
        <!-- Repeat this row -->
       
            @foreach($v_books as $book)
              <tr>

                <td>{{ $book->book_id }}</td>
                <td><img src="{{ asset('uploads/' . $book->book_cover) }}" class="book_cover" alt="book_cover" style="width: 100px;"></td>
                <td>{{ $book->book_title }}</td>
                <td>{{ number_format($book->avg_rating, 2) }}</td>
                <td> {{ $book->total_favorites }} </td>
                <td>{{ $book->total_reading }}</td>
                <td>{{ $book->total_comments }}</td>

              </tr>
            @endforeach
      </tbody>
    </table>
  </div>

</body>
</html>