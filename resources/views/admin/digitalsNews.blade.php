<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>DIGITALES Admin Dashboard</title>
  <link rel="stylesheet" href="{{ asset('css/admin.css') }}"> 
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
  <div class="sidebar">
    <h2>DIGITALES admin</h2>
    <ul>
      <li><a href="{{ route('admin.analytics') }}">📊 Analytics</a></li>
      <li><a href="{{ route('admin.publishs') }}">🚀 Publish Books</a></li>
      <li><a href="{{ route('admin.booksPublished') }}">✅ Books Published</a></li>
      <li><a href="{{ route('admin.userRecord') }}">📝 Users Records</a></li>
      <li><a href="{{ route('admin.statistic') }}">📈 Book Statistics</a></li>
      <li><a href="{{ route('admin.guideline') }}">💡 Guidelines</a></li>
      <li><a href="{{ route('admin.authors') }}">🧑 Author</a></li>
      <li style="background-color: #cbd5f1; color: blue"><a style="color: blue;" href="{{ route('admin.digitalsNews') }}">📰 Digital News</a></li>
    </ul>
  </div>

  <div class="main-content">
    <h1>📰 Digital News</h1>
    <div class="table">
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>News</th>
            <th>Title</th>
            <th>Description</th>
            <th>Date</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>001</td>
            <td><img src="https://covers.openlibrary.org/b/id/10958362-L.jpg" class="news-pic" alt="News"></td>
            <td>Reader's Behaviors</td>
            <td>Readers Behaviours</td>
            <td>Wed, 18 Jun, 2025</td>
            <td><button class="delete-btn">Delete</button></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</body>
</html>
