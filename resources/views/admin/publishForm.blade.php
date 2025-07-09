
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
  <div class="publish-header">
    <h3>
      <i class="fa-solid fa-book"></i>
      {{ $action == "edit" ? 'Edit Book' : 'Publish Book' }}
    </h3>
    <button type="submit" form="publishForm">
      {{ $action == "edit" ? 'Update Book' : 'Publish Book' }}
    </button>
  </div>

  <form id="publishForm" action="/processPublish" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="action" value="{{ $action ?? 'publish' }}">
    @if($action == "edit")
      <input type="hidden" name="book_id" value="{{ $book->book_id }}">
    @endif

    <div class="form-layout">
      <!-- Book Descriptions -->
      <div class="card">
        <h4>Book Descriptions</h4>
        <label for="book_title">Title</label>
        <input type="text" name="book_title" id="book_title" placeholder="Enter Book Title" value="{{ $book->book_title ?? '' }}" required>

        <label for="description">Description</label>
        <input type="text" name="description" id="description" placeholder="Enter Book Description" value="{{ $book->description ?? '' }}">

        <label for="prologue">Prologue</label>
        <textarea name="prologue" id="prologue" placeholder="Enter Book Prologue">{{ $book->prologue ?? '' }}</textarea>
      </div>

      <!-- Upload Section -->
      <div class="card">
        <h4>Upload Book Covers</h4>
        <label for="book_cover">Book Cover</label>
        @if(isset($book) && $book->book_cover)
          <div class="cover-preview" style="margin-bottom: 10px;">
            <img src="{{ asset('uploads/' . $book->book_cover) }}" alt="Book Cover" width="180">
          </div>
        @endif
        <input type="file" name="book_cover" id="book_cover" accept="image/*" @if(!isset($book)) required @endif>
        <div id="book_cover_preview" class="cover-preview"></div>

        <h4 style="margin-top:20px;">Upload PDF</h4>
        <label for="file_path">PDF File</label>
        @if(isset($book) && $book->file_path)
          <div style="margin-bottom: 10px;">
            <a href="{{ asset('uploads/' . $book->file_path) }}" target="_blank">
              {{ basename($book->file_path) }}
            </a>
          </div>
        @endif
        <input type="file" name="file_path" id="file_path" accept=".pdf" @if(!isset($book)) required @endif>
      </div>

      <!-- Relevant Information -->
      <div class="card">
        <h4>Relevant Information</h4>
        <label for="author_name">Author Name</label>
        <input type="text" name="author_name" id="author_name" placeholder="Enter Author Name" value="{{ $book->author_name ?? '' }}">

        <label for="released_date">Released Date</label>
        <input type="date" name="released_date" id="released_date" value="{{ $book->released_date ?? '' }}">

        <label for="total_pages">Total Pages</label>
        <input type="number" name="total_pages" id="total_pages" placeholder="Enter Total Pages" value="{{ $book->total_pages ?? '' }}">

        <label for="book_categories">Book Categories</label>
        <select name="book_categories" id="book_categories">
          <option value="" disabled>Select a category</option>
          <option value="trending" {{ ($book->book_categories ?? '') == 'trending' ? 'selected' : '' }}>Trending Book</option>
          <option value="best-selling" {{ ($book->book_categories ?? '') == 'best-selling' ? 'selected' : '' }}>Best Selling Book</option>
          <option value="newly-added" {{ ($book->book_categories ?? '') == 'newly-added' ? 'selected' : '' }}>Newly Added</option>
        </select>

        <label for="book_genres">Genres (Select at least one) *</label>
        <div class="checkbox-group">
          @foreach($v_genres as $genre)
            <label>
              <input type="checkbox" name="book_genres[]" value="{{ $genre->genre_name }}" {{ in_array($genre->genre_name, explode(',', $book->book_genres ?? '')) ? 'checked' : '' }}>
              {{ $genre->genre_name }}
            </label>
          @endforeach
        </div>
      </div>
    </div>
  </form>
</div>

<script src="{{ asset('js/admin/publishForm.js') }}"></script>
</body>
</html>