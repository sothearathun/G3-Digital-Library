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
      padding: 10px 10px;
      margin-bottom: 5px;
      border-radius: 4px;
      cursor: pointer;
    }

    .nav-item:hover,
    .nav-item.active {
      background-color: #e2e8f0;
      color: #000;
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

    .user-table {
      width: 100%;
      border-collapse: collapse;
      background: #fff;
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 0 10px rgba(0,0,0,0.05);
    }

    .user-table th,
    .user-table td {
      text-align: left;
      padding: 12px 16px;
      border-bottom: 1px solid #eee;
    }

    .user-table th {
      background: #f0f0f0;
    }

    .interaction-btn {
      background-color: #e5e7eb;
      border: none;
      padding: 6px 12px;
      border-radius: 10px;
      font-size: 14px;
      cursor: pointer;
    }

    .interaction-btn:hover {
      background-color: #d1d5db;
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
      <li style="background-color: #cbd5f1; color: blue"><a style="color: blue;" href="{{ route('admin.userRecord') }}">📝 Users Records</a></li>
      <li><a href="{{ route('admin.statistic') }}">📈 Book Statistics</a></li>
      <li><a href="{{ route('admin.guideline') }}">💡 Guidelines</a></li>
      <li><a href="{{ route('admin.authors') }}">🧑 Author</a></li>
      <li><a href="{{ route('admin.digitalsNews') }}">📰 Digital News</a></li>
    </ul>
  </div>

   <div class="content">
    <h2>📖 User Records</h2>
    <table class="user-table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Username</th>
          <th>Joined</th>
          <th>Email</th>
          <th>User's Interaction</th>
        </tr>
      </thead>
      <tbody>
        <!-- Repeat row -->
        <script>
          for (let i = 0; i < 10; i++) {
            document.write(`
              <tr>
                <td>001</td>
                <td>username_123</td>
                <td>02/05/2025</td>
                <td>user@gmail.com</td>
                <td><button class="interaction-btn">see interactions</button></td>
              </tr>
            `);
          }
        </script>
      </tbody>
    </table>
  </div>

</body>
</html>