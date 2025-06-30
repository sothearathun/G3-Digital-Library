<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Publish News Form</title>

  <link rel="stylesheet" href="{{ asset('css/admin/publishNewsForm.css') }}">
</head>
<body>
  
  <x-navigation.admin-sidebar/>
  <!-- form -->
  <div class="content-area">

  @if(isset($news) && $action == "edit")
    <h3>Edit News</h3>
  @else
    <h3>Publish Books</h3>
  @endif
  <form action="/processPublishNews" method="post" enctype="multipart/form-data">
    @csrf
    <!-- hidden action input -->
     <input type="hidden" name="action" value="{{ $action ?? 'publish' }}">

    @if(isset($news) && $action == "edit")
      <input type="hidden" name="news_id" value="{{ $news->news_id }}">
    @endif

    <label for="news_title">News Title</label>
    <input type="text" name="news_title" id="news_title" placeholder="Enter News Title" value="{{ $news->news_title ?? '' }}" required>

    <label for="news_des">News Description</label>
    <input type="text" name="news_des" id="news_des" placeholder="Enter News Description" value="{{ $news->news_des ?? '' }}" required>

    <label for="news_link">News Link</label>
    <input type="text" name="news_link" id="news_link" placeholder="Enter News Link" value="{{ $news->news_link ?? '' }}" required>

    <label for="news_cover">News Cover</label>

     @if(isset($news) && $news->news_cover)
        <p>Current Cover:</p>
        <div style="margin-bottom: 10px;">
            <img src="{{ asset('uploads/' . $news->news_cover) }}" alt="News Cover" width="200">
        </div>
    @endif
    <p>Upload New Cover:</p>
    <input type="file" name="news_cover" id="news_cover" accept="image/*"  @if(!isset($news)) required @endif >
    <div id="news_cover_preview" style="width: 200px; height: 200px; border: 1px solid #ccc; margin-top: 10px;"></div>

    @if(isset($news) && $action == "edit")
      <button type="submit">Update News</button>
    @else
      <button type="submit">Publish News</button>
    @endif
    <button id="cancel-button">Cancel</button>
  </form>
</div>
</body>
<script src="{{ asset('js/admin/publishNewsForm.js') }}"></script>
</html>