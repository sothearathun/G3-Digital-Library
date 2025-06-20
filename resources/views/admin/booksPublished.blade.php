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
    .summary {
      position: absolute;
      top: 20px;
      right: 20px;
      font-weight: bold;
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
    .actions button {
      margin: 2px;
      padding: 5px 10px;
      border: none;
      border-radius: 10px;
      cursor: pointer;
    }
    .edit {
      background-color: #cbd5f1;
    }
    .delete {
      background-color: #fca5a5;
    }
    img.book-cover {
      width: 60px;
      height: auto;
      border-radius: 6px;
    }
  </style>
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
        <tbody>
          <tr>
            <td>001</td>
            <td><img src="https://i.imgur.com/tj7EAv7.jpg" class="book-cover" /></td>
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
          <tr>
            <td>001</td>
            <td><img src="https://i.imgur.com/tj7EAv7.jpg" class="book-cover" /></td>
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
          <tr>
            <td>001</td>
            <td><img src="https://i.imgur.com/tj7EAv7.jpg" class="book-cover" /></td>
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
          <tr>
            <td>001</td>
            <td><img src="layer/9780091816971.jpg" class="book-cover" /></td>
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
      </table>
    </div>
  </div>
</body>
</html>
