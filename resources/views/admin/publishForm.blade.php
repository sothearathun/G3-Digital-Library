<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Publish Book</title>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
  <link rel="stylesheet" href="{{ asset('css/admin/publishForm.css') }}">
</head>

<body>

<x-navigation.admin-sidebar/>

<div class="content-area">
  <h3>Publish Books</h3>
  <form action="/processPublish" method="post" enctype="multipart/form-data">
    @csrf

    <label for="book_title">Book Title</label>
    <input type="text" name="book_title" id="book_title" placeholder="Enter Book Title">

    <label for="description">Book Description</label>
    <input type="text" name="description" id="description" placeholder="Enter Book Description">

    <label for="prologue">Book Prologue</label>
    <textarea name="prologue" id="prologue" placeholder="Enter Book Prologue"></textarea>

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

  <label for="book_genres">Genres (Select at least one) *</label>
      <div class="checkbox-group">
          @foreach($v_genres as $genre)
              <label>
                  <input type="checkbox" name="book_genres[]" value="{{ $genre->genre_name }}">
                  {{ $genre->genre_name }}
                  <!-- @if($genre->genre_status == 'popular-genre')
                      <span class="badge">Popular</span>
                  @endif -->
              </label>
          @endforeach
      </div>


    <label for="file_path">File Path</label>
    <input type="file" name="file_path" id="file_path">

    <label for="book_cover">Book Cover</label>
      <input type="file" name="book_cover" id="book_cover" accept="image/*">

      <div id="book_cover_preview" style="width: 200px; height: 200px; border: 1px solid #ccc; margin-top: 10px;"></div>

    <button type="submit">Publish Book</button>
  </form>
</div>

<!-- update form -->



</body>
<script src="{{ asset('js/admin/publishForm.js') }}"></script>
</html>