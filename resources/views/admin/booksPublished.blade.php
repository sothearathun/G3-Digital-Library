<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books Library</title>
    <link rel="stylesheet" href="{{ asset('css/admin/booksPublished.css') }}">
</head>

<body>

<x-navigation.admin-sidebar/>

    <div class="container">
        <h2>Books Library</h2>
        
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Cover</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Description</th>
                        <th>Pages</th>
                        <th>Category</th>
                        <th>Genres</th>
                        <th>Released Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    
                      @forelse ($v_bookPublished as $book)
                        <tr>
                            <td>
                                <img src="{{ asset('uploads/' . $book->book_cover) }}" alt="{{ $book->book_title }}">
                            </td>
                            <td>{{ $book->book_title }}</td>
                            <td>{{ $book->author_name }}</td>
                            <td class="description">{{ $book->description }}</td>
                            <td>{{ $book->total_pages }}</td>
                            <td>{{ $book->book_categories }}</td>
                            <td class="genres">
                                @if($book->book_genres)
                                    @foreach(explode(',', $book->book_genres) as $genre)
                                        <span class="genre-tag">{{ trim($genre) }}</span>
                                    @endforeach
                                @endif
                            </td>
                            <td>{{ $book->released_date }}</td>
                            <td>
                                <a href="{{ asset('uploads/' . $book->file_path) }}" class="btn btn-sm btn-primary" target="_blank">View</a>
                                <a href="{{ route('editBookForm', ['book_id' => $book->book_id]) }}" class="btn btn-sm btn-warning">Edit</a>
                                <a href="{{ route('processDeleteBook', ['book_id' => $book->book_id]) }}" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="no-books">No books published yet.</td>
                        </tr>
                    @endforelse
                    
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>