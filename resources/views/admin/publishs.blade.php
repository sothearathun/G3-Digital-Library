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
        <!-- <img src="https://covers.openlibrary.org/b/id/10958362-L.jpg" alt="Book Cover"> -->
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
