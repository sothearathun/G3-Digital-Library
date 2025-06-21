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
    .form-section {
      margin-top: 20px;
      display: flex;
      gap: 20px;
    }
    .form-left, .form-right {
      flex: 1;
      background-color: #f1f1f1;
      padding: 20px;
      border-radius: 20px;
    }
    input[type="text"], input[type="date"], textarea {
      width: 100%;
      padding: 10px;
      margin: 10px 0;
      border: none;
      border-radius: 20px;
      background-color: #ddd;
    }
    textarea {
      height: 120px;
    }
    .upload-section img {
      width: 100%;
      border-radius: 10px;
      margin-top: 10px;
    }
    .upload-section input[type="file"] {
      margin: 10px 0;
    }
    .button {
      position: absolute;
      right: 20px;
      top: 20px;
      background-color: #1e40af;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 20px;
      cursor: pointer;
    }
    .info-row {
      display: flex;
      gap: 20px;
    }
    .tags {
      margin-top: 10px;
      display: flex;
      flex-wrap: wrap;
      gap: 10px;
    }
    .tag {
      background-color: #eee;
      border-radius: 20px;
      padding: 5px 15px;
    }
    .tag.selected {
      background-color: #e0e7ff;
      color: #1e3a8a;
    }
  </style>
</head>
<body>
  <div class="sidebar">
    <h2>DIGITALES admin</h2>
    <ul>
      <li><a href="{{ route('admin.analytics') }}">📊 Analytics</a></li>
      <li style="background-color: #cbd5f1; color: blue"><a style="color: blue;" href="{{ route('admin.publishs') }}">🚀 Publish Books</a></li>
      <li><a href="{{ route('admin.booksPublished') }}">✅ Books Published</a></li>
      <li><a href="{{ route('admin.userRecord') }}">📝 Users Records</a></li>
      <li><a href="{{ route('admin.statistic') }}">📈 Book Statistics</a></li>
      <li><a href="{{ route('admin.guideline') }}">💡 Guidelines</a></li>
      <li><a href="{{ route('admin.authors') }}">🧑 Author</a></li>
      <li><a href="{{ route('admin.digitalsNews') }}">📰 Digital News</a></li>
    </ul>
  </div>

  <div class="main-content">
    <h1>📖 Publish Books</h1>
    <button class="button">Publish Book</button>
    <div class="form-section">
      <div class="form-left">
        <h3>Book Descriptions</h3>
        <label>Titles</label>
        <input type="text" placeholder="Enter title" />
        <label>Descriptions</label>
        <textarea placeholder="Enter description"></textarea>
      </div>
      <div class="form-right upload-section">
        <h3>Upload Book Covers</h3>
        <input type="file" />
        <img src="layer/9780091816971.jpg" alt="Book Cover">
        <h3>Upload PDF</h3>
        <input type="file" />
      </div>
    </div>
 <div class="form-section">
      <div class="form-left">
        <h3>Relevant informations</h3>
        <div class="info-row">
          <input type="text" placeholder="Author's Name" />
          <input type="date" placeholder="Released Date" />
        </div>
        <h4>Genres</h4>
        <div class="tags">
          <div class="tag">romance</div>
          <div class="tag">history</div>
          <div class="tag">mystery</div>
          <div class="tag">comedy</div>
          <div class="tag">drama</div>
          <div class="tag">sci-fi</div>
          <div class="tag">fantasy</div>
          <div class="tag">thriller</div>
        </div>
      </div>
    </div>
  </div>
  <script>
    document.querySelectorAll('.tag').forEach(tag => {
      tag.addEventListener('click', () => {
        tag.classList.toggle('selected');
      });
    });
  </script>
</body>
</html>
