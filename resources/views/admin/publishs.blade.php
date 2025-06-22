<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Publish Book</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      padding: 30px;
      background-color: #f8f8f8;
    }

    h3 {
      color: #333;
      margin-bottom: 20px;
    }

    form {
      background-color: #fff;
      padding: 25px;
      border-radius: 8px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
      max-width: 600px;
    }

    label {
      display: block;
      margin-bottom: 6px;
      font-weight: bold;
    }

    input[type="text"],
    input[type="number"],
    input[type="date"],
    input[type="file"],
    select {
      width: 100%;
      padding: 8px 10px;
      margin-bottom: 16px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }

    input[type="checkbox"] {
      margin-right: 5px;
    }

    .checkbox-group label {
      display: block;
      margin-bottom: 8px;
      font-weight: normal;
    }

    button[type="submit"] {
      background-color: #4CAF50;
      color: white;
      padding: 10px 18px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 16px;
    }

    button[type="submit"]:hover {
      background-color: #45a049;
    }
  </style>
</head>

<body>

  <h3>Publish Books</h3>
  <form method="post" enctype="multipart/form-data">
    @csrf

    <label for="book_title">Book Title</label>
    <input type="text" name="book_title" id="book_title" placeholder="Enter Book Title">

    <label for="description">Book Description</label>
    <input type="text" name="description" id="description" placeholder="Enter Book Description">

    <label for="total_pages">Total Pages</label>
    <input type="number" name="total_pages" id="total_pages" placeholder="Enter Total Pages">

    <label for="book_categories">Book Categories</label>
    <select name="book_categories" id="book_categories">
      <option value="">Select a category</option>
      <option value="trending">Trending Book</option>
      <option value="best-selling">Best Selling Book</option>
      <option value="newly-added">Newly Added</option>
    </select>

    <label for="author_name">Author Name</label>
    <input type="text" name="author_name" id="author_name" placeholder="Enter Author Name">

    <label for="released_date">Released Date</label>
    <input type="date" name="released_date" id="released_date">

    <label for="book_genres">Genres</label>
    <div class="checkbox-group">
      <label><input type="checkbox" name="book_genres[]" value="fiction">Fiction</label>
      <label><input type="checkbox" name="book_genres[]" value="non-fiction">Non-Fiction</label>
      <label><input type="checkbox" name="book_genres[]" value="mystery">Mystery</label>
      <label><input type="checkbox" name="book_genres[]" value="fantasy">Fantasy</label>
      <label><input type="checkbox" name="book_genres[]" value="romance">Romance</label>
      <label><input type="checkbox" name="book_genres[]" value="science-fiction">Science-Fiction</label>
      <label><input type="checkbox" name="book_genres[]" value="historical">Historical</label>
      <label><input type="checkbox" name="book_genres[]" value="thriller">Thriller</label>
      <label><input type="checkbox" name="book_genres[]" value="biography">Biography</label>
      <label><input type="checkbox" name="book_genres[]" value="self-help">Self-Help</label>
    </div>

    <label for="file_path">File Path</label>
    <input type="file" name="file_path" id="file_path">

    <label for="book_cover">Book Cover</label>
<input type="file" name="book_cover" id="book_cover" accept="image/*">

<div id="book_cover_preview" style="width: 200px; height: 200px; border: 1px solid #ccc; margin-top: 10px;"></div>

    <button type="submit">Publish Book</button>
  </form>

</body>

<script>
  const bookCoverInput = document.getElementById('book_cover');
  const bookCoverPreview = document.getElementById('book_cover_preview');

  bookCoverInput.addEventListener('change', (e) => {
    const file = e.target.files[0];
    const reader = new FileReader();

    reader.onload = (event) => {
      bookCoverPreview.style.backgroundImage = `url(${event.target.result})`;
    };

    reader.readAsDataURL(file);
  });
</script>

</html>