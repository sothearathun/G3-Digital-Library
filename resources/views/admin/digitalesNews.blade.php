<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>DIGITALES Admin Dashboard</title>
  <link rel="stylesheet" href="{{ asset('css/admin/digitalesNews.css') }}"> 
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>

<x-navigation.admin-sidebar/>

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
