<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Analytics</title>

  <link rel="stylesheet" href="{{ asset('css/admin/authors.css') }}"> 
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>

<x-navigation.admin-sidebar/>

<div class="main-content">
    <h1>📚 Author</h1>
    <div class="table">
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Author</th>
            <th>Name</th>
            <th>Genre</th>
            <th>Total Books</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>001</td>
            <td><img src="https://covers.openlibrary.org/b/id/10958362-L.jpg" class="author-pic" alt="Author"></td>
            <td>J.K Rowling</td>
            <td>Romance, Comedy, Thriller</td>
            <td>233</td>
            <td><button class="see-books-btn">See all books</button></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</body>
</html>
