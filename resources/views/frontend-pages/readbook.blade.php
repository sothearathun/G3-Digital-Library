<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $book->book_title }}</title>
  <link rel="stylesheet" href="{{ asset('css/web/readbook.css') }}">
</head>
<body>
  <h1>{{ $book->book_title }}</h1>
  <p>Author: {{ $book->author_name }}</p>
  <p>Published: {{ \Carbon\Carbon::parse($book->released_date)->format('j F Y') }}</p>
   <div class="reader-wrapper">

    <iframe src="{{ asset($book->file_path) }}" width="100%" height="500" frameborder="0"></iframe>
  
  </div>

</body>
</html>