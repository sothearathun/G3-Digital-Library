<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>DIGITALES Admin Dashboard</title>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <style>
    body {
      font-family: Arial, sans-serif;
      display: flex;
      margin: 0;
    }
    .sidebar {
      width: 200px;
      background-color: #f4f4f4;
      padding: 10px;
      height: 100vh;
    }
    .sidebar a{
    text-decoration: none;
    color: black;
    }
    .sidebar h2 {
      font-size: 16px;
      margin: 10px 0;
    }
    .sidebar ul {
      list-style-type: none;
      padding: 0;
    }
    .sidebar ul li {
      padding: 8px;
      cursor: pointer;
    }
    .sidebar ul li:hover {
      background-color: #ddd;
    }

    .main-content {
      flex: 1;
      padding: 20px;
      background-color: #fff;
      position: relative;
    }
    .main-content h1 {
      display: flex;
      align-items: center;
      gap: 10px;
      font-size: 24px;
    }
    .table {
      margin-top: 40px;
      background-color: #f6f6f6;
      border-radius: 20px;
      overflow: hidden;
    }
    table {
      width: 100%;
      border-collapse: collapse;
    }
    th, td {
      padding: 12px;
      text-align: left;
    }
    th {
      background-color: #e5e7eb;
    }
    tr:nth-child(even) {
      background-color: #fdfdfd;
    }
    .news-pic {
      width: 60px;
      height: 90px;
      border-radius: 4px;
    }
    .delete-btn {
      background-color: #e5e7eb;
      padding: 5px 10px;
      border: none;
      border-radius: 12px;
      cursor: pointer;
    }
  </style>
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
            <td><img src="https://i.imgur.com/rzvKw2F.png" class="news-pic" alt="News"></td>
            <td>Reader's Behaviors</td>
            <td>Readers Behaviours</td>
            <td>Wed, 18 Jun, 2025</td>
            <td><button class="delete-btn">Delete</button></td>
          </tr>
          <tr>
            <td>001</td>
            <td><img src="https://i.imgur.com/rzvKw2F.png" class="news-pic" alt="News"></td>
            <td>Reader's Behaviors</td>
            <td>Readers Behaviours</td>
            <td>Wed, 18 Jun, 2025</td>
            <td><button class="delete-btn">Delete</button></td>
          </tr>
          <tr>
            <td>001</td>
            <td><img src="https://i.imgur.com/rzvKw2F.png" class="news-pic" alt="News"></td>
            <td>Reader's Behaviors</td>
            <td>Readers Behaviours</td>
            <td>Wed, 18 Jun, 2025</td>
            <td><button class="delete-btn">Delete</button></td>
          </tr>
          <tr>
            <td>001</td>
            <td><img src="https://i.imgur.com/rzvKw2F.png" class="news-pic" alt="News"></td>
            <td>Reader's Behaviors</td>
            <td>Readers Behaviours</td>
            <td>Wed, 18 Jun, 2025</td>
            <td><button class="delete-btn">Delete</button></td>
          </tr>
          <tr>
            <td>001</td>
            <td><img src="https://i.imgur.com/rzvKw2F.png" class="news-pic" alt="News"></td>
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
