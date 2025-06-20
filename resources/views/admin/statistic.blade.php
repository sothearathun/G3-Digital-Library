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

        .nav-item {
      padding: 10px;
      margin-bottom: 5px;
      border-radius: 4px;
      cursor: pointer;
    }

    .nav-item:hover,
    .nav-item.active {
      background-color: #e2e8f0;
    }

    .content {
      flex-grow: 1;
      padding: 30px;
    }

    .content h2 {
      font-size: 22px;
      margin-bottom: 20px;
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .book-table {
      width: 100%;
      border-collapse: collapse;
      background: #fff;
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 0 10px rgba(0,0,0,0.05);
    }

    .book-table th,
    .book-table td {
      text-align: left;
      padding: 12px 16px;
      border-bottom: 1px solid #eee;
      vertical-align: middle;
    }

    .book-table th {
      background: #f0f0f0;
    }

    .book-cover {
      width: 50px;
      height: auto;
      border-radius: 4px;
    }

    .see-btn {
      background-color: #e5e7eb;
      border: none;
      padding: 6px 12px;
      border-radius: 10px;
      font-size: 14px;
      cursor: pointer;
    }

    .see-btn:hover {
      background-color: #d1d5db;
    }
  </style>
</head>
<body>
  <div class="sidebar">
    <h2>DIGITALES admin</h2>
    <ul>
      <li><a href="{{ route('backend.analytics') }}">📊 Analytics</a></li>
      <li><a href="{{ route('backend.publish') }}">🚀 Publish Books</a></li>
      <li><a href="{{ route('backend.bookPublished') }}">✅ Books Published</a></li>
      <li><a href="{{ route('backend.userRecords') }}">📝 Users Records</a></li>
      <li style="background-color: #cbd5f1"><a href="{{ route('backend.statistics') }}">📈 Book Statistics</a></li>
      <li><a href="{{ route('backend.guidelines') }}">💡 Guidelines</a></li>
      <li><a href="{{ route('backend.author') }}">🧑 Author</a></li>
      <li><a href="{{ route('backend.digitalNews') }}">📰 Digital News</a></li>
    </ul>

  </div>

   <div class="content">
    <h2>📖 Book Statistics</h2>
    <table class="book-table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Cover</th>
          <th>Titles</th>
          <th>Avg. Ratings</th>
          <th>Total Favs</th>
          <th>Total Read</th>
          <th>Total Finished</th>
          <th>Comments</th>
        </tr>
      </thead>
      <tbody>
        <!-- Repeat this row -->
        <script>
          const imageURL = "https://covers.openlibrary.org/b/id/10958362-L.jpg"; // Placeholder
          for (let i = 0; i < 5; i++) {
            document.write(`
              <tr>
                <td>001</td>
                <td><img src="${imageURL}" alt="Book Cover" class="book-cover"></td>
                <td>Before the coffee gets cold</td>
                <td>5/5</td>
                <td>100</td>
                <td>233</td>
                <td>98</td>
                <td>98 <button class="see-btn">See all</button></td>
              </tr>
            `);
          }
        </script>
      </tbody>
    </table>
  </div>

</body>
</html>