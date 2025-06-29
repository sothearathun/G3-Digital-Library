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
  <h3>Publish Books</h3>
  <form action="/processPublishNews" method="post" enctype="multipart/form-data">
    @csrf

    <label for="news_title">News Title</label>
    <input type="text" name="news_title" id="news_title" placeholder="Enter News Title">

    <label for="news_des">News Description</label>
    <input type="text" name="news_des" id="news_des" placeholder="Enter News Description">

    <label for="news_link">News Link</label>
    <input type="text" name="news_link" id="news_link" placeholder="Enter News Link">

    <label for="news_cover">News Cover</label>
    <input type="file" name="news_cover" id="news_cover" accept="image/*">
    <div id="news_cover_preview" style="width: 200px; height: 200px; border: 1px solid #ccc; margin-top: 10px;"></div>

    
    <button type="submit">Publish News</button>
    <button id="cancel-button">Cancel</button>
  </form>
</div>
</body>
<script src="{{ asset('js/admin/publishNewsForm.js') }}"></script>
</html>