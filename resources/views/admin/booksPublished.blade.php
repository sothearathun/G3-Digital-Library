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
      <li style="background-color: #cbd5f1; color: blue"><a style="color: blue;" href="{{ route('admin.booksPublished') }}">✅ Books Published</a></li>
      <li><a href="{{ route('admin.userRecord') }}">📝 Users Records</a></li>
      <li><a href="{{ route('admin.statistic') }}">📈 Book Statistics</a></li>
      <li><a href="{{ route('admin.guideline') }}">💡 Guidelines</a></li>
      <li><a href="{{ route('admin.authors') }}">🧑 Author</a></li>
      <li><a href="{{ route('admin.digitalsNews') }}">📰 Digital News</a></li>
    </ul>
  </div>

   <div class="main-content">
    <h1>📚 Books Published</h1>
    <div class="summary">Total Books Published: 168</div>
    <div class="table">
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Cover</th>
            <th>Titles</th>
            <th>Descriptions</th>
            <th>Authors</th>
            <th>Genre</th>
            <th>Pages</th>
            <th>Actions</th>
          </tr>
        </thead>
        <div class="booksPublished">
          <tbody>
            <tr>
              <td>001</td>
              <td><img src="https://covers.openlibrary.org/b/id/10958362-L.jpg" style="width: 60px; 
      height: 90px;
      border-radius: 4px;" class="book-cover" /></td>
              <td>Before the coffee gets cold</td>
              <td>this is the book descriptions and spoilers of the books</td>
              <td>J.K Rowling</td>
              <td>Comedy</td>
              <td>233 pages</td>
              <td class="actions">
                <button class="edit">edit</button>
                <button class="delete">delete</button>
              </td>
            </tr>
          </tbody>
        </div>
      </table>
    </div>
  </div>
</body>
</html>
