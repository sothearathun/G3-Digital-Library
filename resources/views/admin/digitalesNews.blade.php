<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>DIGITALES Admin Dashboard</title>
  <link rel="stylesheet" href="{{ asset('css/admin/digitalesNews.css') }}"> 
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>

<x-navigation.admin-sidebar/>

  <div class="main-content">
    <h1>📰 Digital News</h1>
    <a href="{{ route('publishNewsForm') }}">Publish News</a>
    <div class="table">
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>News_cover</th>
            <th>Title</th>
            <th>Description</th>
            <th>Links</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($v_news as $news)
          <tr>
            <td>{{ $news->news_id }}</td>
            <td>
              <img src="{{ asset($news->news_cover) }}" class="book-cover" alt="Book Cover" style="width: 100px; height: 100px;">
            </td>
            <td>{{ $news->news_title }}</td>
            <td>{{ $news->news_des }}</td>
            <td>
              <a href="{{ $news->news_link }}" target="_blank">{{ $news->news_link }}</a>
            </td>
            <td>
              <a href="" class="edit-button">Edit</a>
              <a href="" class="delete-button">Delete</a>
            </td>
          </tr>
          @endforeach
      </table>
    </div>
  </div>
</body>
</html>
