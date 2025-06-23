<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books Library</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            background-color: #f8f8f8;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        h2 {
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }

        .table-container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 800px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #4CAF50;
            color: white;
            font-weight: bold;
            position: sticky;
            top: 0;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        .book-cover {
            width: 50px;
            height: 60px;
            object-fit: cover;
            border-radius: 4px;
            border: 1px solid #ddd;
        }

        .genres {
            max-width: 150px;
        }

        .genre-tag {
            display: inline-block;
            background-color: #e7f3ff;
            color: #0066cc;
            padding: 2px 6px;
            border-radius: 12px;
            font-size: 12px;
            margin: 1px;
        }

        .category-badge {
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 12px;
            font-weight: bold;
        }

        .trending { background-color: #ff6b6b; color: white; }
        .best-selling { background-color: #4ecdc4; color: white; }
        .newly-added { background-color: #45b7d1; color: white; }

        .description {
            max-width: 200px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .no-books {
            text-align: center;
            padding: 40px;
            color: #666;
            font-style: italic;
        }

        .add-book-btn {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 4px;
            display: inline-block;
            margin-bottom: 20px;
        }

        .add-book-btn:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
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
                                <img src="{{ asset($book->book_cover) }}" class="book-cover" alt="Book Cover">
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
                                <a href="#" class="btn btn-sm btn-primary">View</a>
                                <a href="#" class="btn btn-sm btn-warning">Edit</a>
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