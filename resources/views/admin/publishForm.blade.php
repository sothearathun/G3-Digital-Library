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

  
    @if($action == "edit")
      <h3>Edit Book</h3>
    @else
      <h3>Publish Book</h3>
    @endif

  <form action="/processPublish" method="post" enctype="multipart/form-data">
    @csrf

    <input type="hidden" name="action" value="{{ $action ?? 'publish' }}">

    <!-- $book variable is to deal with edit form, $genre is to deal with publishform -->


    @if($action == "edit")
      <input type="hidden" name="book_id" value="{{ $book->book_id }}">
    @endif

    <label for="book_title">Book Title</label>
    <input type="text" name="book_title" id="book_title" placeholder="Enter Book Title" value="{{ $book->book_title ?? '' }}" required>

    <label for="description">Book Description</label>
    <input type="text" name="description" id="description" placeholder="Enter Book Description" value="{{ $book->description ?? '' }}">

    <label for="prologue">Book Prologue</label>
    <textarea name="prologue" id="prologue" placeholder="Enter Book Prologue">{{ $book->prologue ?? '' }}</textarea>

    <label for="total_pages">Total Pages</label>
    <input type="number" name="total_pages" id="total_pages" placeholder="Enter Total Pages" value="{{ $book->total_pages ?? '' }}">

    <label for="book_categories">Book Categories</label>
    <select name="book_categories" id="book_categories">
      <option value="" disabled>Select a category</option>
      <option value="trending" {{ ($book->book_categories ?? '') == 'trending' ? 'selected' : '' }}>Trending Book</option>
      <option value="best-selling" {{ ($book->book_categories ?? '') == 'best-selling' ? 'selected' : '' }}>Best Selling Book</option>
      <option value="newly-added" {{ ($book->book_categories ?? '') == 'newly-added' ? 'selected' : '' }}>Newly Added</option>
    </select>


    <label for="author_name">Author Name</label>
    <input type="text" name="author_name" id="author_name" placeholder="Enter Author Name" value="{{ $book->author_name ?? '' }}">

    <label for="released_date">Released Date</label>
    <input type="date" name="released_date" id="released_date" value="{{ $book->released_date ?? '' }}">

  <label for="book_genres">Genres (Select at least one) *</label>
      <div class="checkbox-group">
          @foreach($v_genres as $genre)
              <label>
                  <input type="checkbox" name="book_genres[]" value="{{ $genre->genre_name }}" {{ in_array($genre->genre_name, explode(',', $book->book_genres ?? '')) ? 'checked' : '' }}>
                  {{ $genre->genre_name }}
                  <!-- @if($genre->genre_status == 'popular-genre')
                      <span class="badge">Popular</span>
                  @endif -->
              </label>
          @endforeach
      </div>


    <label for="file_path">File Path (pdf)</label>
    @if(isset($book) && $book->file_path)
        <p>
            <p>Current File:</p>
            <a href="{{ asset('uploads/' . $book->file_path) }}" target="_blank">
                {{ basename($book->file_path) }}
            </a>
        </p>
    @endif
    <p>Upload New File:</p>
    <input type="file" name="file_path" id="file_path" accept=".pdf"
    @if(!isset($book)) required @endif>

    <label for="book_cover">Book Cover</label>
     @if(isset($book) && $book->book_cover)
        <p>Current Cover:</p>
        <div style="margin-bottom: 10px;">
            <img src="{{ asset('uploads/' . $book->book_cover) }}" alt="Book Cover" width="200">
        </div>
    @endif
    <p>Upload New Cover:</p>
    <input type="file" name="book_cover" id="book_cover" accept="image/*"  @if(!isset($book)) required @endif >


    <div id="book_cover_preview" style="width: 200px; height: 200px; border: 1px solid #ccc; margin-top: 10px;" ></div>

    @if($action == "edit")
      <button type="submit">Update Book</button>
    @else
      <button type="submit">Publish Book</button>
    @endif

  </form>
</div>

<!-- update form -->



</body>
<script src="{{ asset('js/admin/publishForm.js') }}"></script>
</html>