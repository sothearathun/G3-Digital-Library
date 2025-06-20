
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

  </style>

<body>
  <div class="sidebar">
    <h2>DIGITALES admin</h2>
    <ul>
      <li><a href="{{ route('backend.analytics') }}">📊 Analytics</a></li>
      <li><a href="{{ route('backend.publish') }}">🚀 Publish Books</a></li>
      <li><a href="{{ route('backend.bookPublished') }}">✅ Books Published</a></li>
      <li><a href="{{ route('backend.userRecords') }}">📝 Users Records</a></li>
      <li><a href="{{ route('backend.statistics') }}">📈 Book Statistics</a></li>
      <li><a href="{{ route('backend.guidelines') }}">💡 Guidelines</a></li>
      <li><a href="{{ route('backend.author') }}">🧑 Author</a></li>
      <li><a href="{{ route('backend.digitalNews') }}">📰 Digital News</a></li>
    </ul>

  </div>