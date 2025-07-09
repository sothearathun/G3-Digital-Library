<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Author;
use App\Models\Digitales_News;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Models\User;




class AdminApiController extends Controller
{
    public function getAllBooks()
    {
        return response()->json(Book::orderBy('book_id', 'desc')->get());
    }

    public function getBook($book_id)
    {
        $book = Book::find($book_id);
        if (!$book) {
            return response()->json(['message' => 'Book not found'], 404);
        }
        return response()->json($book);
    }

    // public function createBook(Request $request)
    // {
    //     $validated = $request->validate([
    //         'book_title' => 'required|string',
    //         'author_name' => 'required|string',
    //         'description' => 'nullable|string',
    //         'prologue' => 'nullable|string',
    //         'total_pages' => 'required|integer',
    //         'book_categories' => 'required|string',
    //         'released_date' => 'required|date',
    //         'book_genres' => 'array',
    //         'file_path' => 'required|file|mimes:pdf,doc,docx',
    //         'book_cover' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048'
    //     ]);

    //     $author = Author::firstOrCreate(['author_name' => $validated['author_name']]);

    //     // Upload files
    //     $filePath = $request->file('file_path')->store('books', 'public');
    //     $bookCoverPath = $request->file('book_cover')->store('book_covers', 'public');

    //     // Create book manually instead of mass-assigning everything
    //     $book = new Book();
    //     $book->book_title = $validated['book_title'];
    //     $book->author_name = $author->author_name;
    //     $book->description = $validated['description'];
    //     $book->prologue = $validated['prologue'];
    //     $book->total_pages = $validated['total_pages'];
    //     $book->book_categories = $validated['book_categories'];
    //     $book->released_date = $validated['released_date'];
    //     $book->book_genres = implode(',', $validated['book_genres']);
    //     $book->file_path = $filePath;
    //     $book->book_cover = $bookCoverPath;
        
    //     $book->save();

    //     return response()->json(['message' => 'Book published successfully', 'book' => $book]);
    // }

    public function createBook(Request $request)
    {
    $validated = $request->validate([
        'book_title' => 'required|string',
        'author_name' => 'required|string',
        'description' => 'nullable|string',
        'prologue' => 'nullable|string',
        'total_pages' => 'required|integer',
        'book_categories' => 'required|string',
        'released_date' => 'required|date',
        'book_genres' => 'sometimes|array',
        'file_path' => 'required|file|mimes:pdf,doc,docx',
        'book_cover' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048'
    ]);

    // Ensure Author exists
    $author = Author::firstOrCreate([
        'author_name' => $validated['author_name']
    ]);

    // Store files safely
    if (!$request->hasFile('file_path') || !$request->hasFile('book_cover')) {
        return response()->json(['error' => 'File upload failed'], 422);
    }

    $filePath = $request->file('file_path')->store('books', 'public');
    $bookCoverPath = $request->file('book_cover')->store('book_covers', 'public');

    // Normalize genres
    $genres = $validated['book_genres'] ?? [];
        if (is_string($genres)) {
            $genres = [$genres]; // in case user submitted a string
        }

        $book = new Book();
        $book->book_title = $validated['book_title'];
        $book->author_name = $author->author_name;
        $book->description = $validated['description'] ?? null;
        $book->prologue = $validated['prologue'] ?? null;
        $book->total_pages = $validated['total_pages'];
        $book->book_categories = $validated['book_categories'];
        $book->released_date = $validated['released_date'];
        $book->book_genres = implode(',', $genres);
        $book->file_path = $filePath;
        $book->book_cover = $bookCoverPath;

        $book->save();

        return response()->json([
            'message' => 'Book published successfully',
            'book' => $book
        ]);
    }


    // public function updateBook(Request $request, $id)
    // {
    //     $book = Book::find($id);
    //     if (!$book) {
    //         return response()->json(['message' => 'Book not found'], 404);
    //     }

    //     $validated = $request->validate([
    //         'book_title' => 'required|string',
    //         'author_name' => 'required|string',
    //         'description' => 'nullable|string',
    //         'prologue' => 'nullable|string',
    //         'total_pages' => 'required|integer',
    //         'book_categories' => 'required|string',
    //         'released_date' => 'required|date',
    //         'book_genres' => 'array'
    //     ]);

    //     $author = Author::firstOrCreate(['author_name' => $validated['author_name']]);

    //     $book->fill($validated);
    //     $book->author_name = $author->author_name;
    //     $book->book_genres = isset($validated['book_genres']) ? implode(',', $validated['book_genres']) : '';
    //     $book->save();

    //     return response()->json(['message' => 'Book updated successfully', 'book' => $book]);
    // }

    public function updateBook(Request $request, $id)
    {
        $book = Book::find($id);
        if (!$book) {
            return response()->json(['message' => 'Book not found'], 404);
        }

        $validated = $request->validate([
            'book_title' => 'required|string',
            'author_name' => 'required|string',
            'description' => 'nullable|string',
            'prologue' => 'nullable|string',
            'total_pages' => 'required|integer',
            'book_categories' => 'required|string',
            'released_date' => 'required|date',
            'book_genres' => 'array',
            'file_path' => 'nullable|file|mimes:pdf,doc,docx',
            'book_cover' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        $author = Author::firstOrCreate(['author_name' => $validated['author_name']]);

        // Update basic info
        $book->fill($validated);
        $book->author_name = $author->author_name;
        $book->book_genres = isset($validated['book_genres']) ? implode(',', $validated['book_genres']) : $book->book_genres;

        // Replace file_path if new file uploaded
        if ($request->hasFile('file_path')) {
            $filePath = $request->file('file_path')->store('books', 'public');
            $book->file_path = $filePath;
        }

        // Replace book_cover if new image uploaded
        if ($request->hasFile('book_cover')) {
            $bookCoverPath = $request->file('book_cover')->store('book_covers', 'public');
            $book->book_cover = $bookCoverPath;
        }
        $book->save();
        return response()->json(['message' => 'Book updated successfully', 'book' => $book]);
    }

    public function deleteBook($id)
    {
        $book = Book::find($id);
        if (!$book) {
            return response()->json(['message' => 'Book not found'], 404);
        }

        // Use the correct relation method names as defined in your model:
        $book->favorites()->delete();
        $book->comments()->delete();
        $book->ratings()->delete();
        $book->readingProgress()->delete();

        // Delete files if stored
        if ($book->file_path && Storage::disk('public')->exists($book->file_path)) {
            Storage::disk('public')->delete($book->file_path);
        }
        if ($book->book_cover && Storage::disk('public')->exists($book->book_cover)) {
            Storage::disk('public')->delete($book->book_cover);
        }

        $book->delete();

        return response()->json(['message' => 'Book deleted successfully']);
    }




    // NEWS
    public function getAllNews()
    {
        return response()->json(Digitales_News::orderBy('news_id', 'desc')->get());
    }

    public function createNews(Request $request)
    {
        $validated = $request->validate([
            'news_title' => 'required|string',
            'news_des' => 'nullable|string',
            'news_link' => 'nullable|string|url',
            'news_cover' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // Safely handle file upload
        if ($request->hasFile('news_cover')) {
            $newsCoverPath = $request->file('news_cover')->store('news_covers', 'public');
        } else {
            $newsCoverPath = null;
        }

        // Create the news record manually (safer than mass-assign)
        $news = new Digitales_News();
        $news->news_title = $validated['news_title'];
        $news->news_des = $validated['news_des'] ?? null;
        $news->news_link = $validated['news_link'] ?? null;
        $news->news_cover = $newsCoverPath;
        $news->save();

        return response()->json([
            'message' => 'News published successfully',
            'news' => $news
        ]);
    }



    public function updateNews(Request $request, $id)
    {
        $news = Digitales_News::find($id);
        if (!$news) {
            return response()->json(['message' => 'News not found'], 404);
        }

        $validated = $request->validate([
            'news_title' => 'required|string',
            'news_des' => 'nullable|string',
            'news_link' => 'nullable|string',
        ]);

        $news->update($validated);

        return response()->json(['message' => 'News updated successfully', 'news' => $news]);
    }

    public function deleteNews($id)
    {
        $news = Digitales_News::find($id);
        if (!$news) {
            return response()->json(['message' => 'News not found'], 404);
        }

        $news->delete();
        return response()->json(['message' => 'News deleted successfully']);
    }

    public function analytics()
    {
        // Total Users
        $totalUsers = User::count();

        // Active Users
        $activeUsers = DB::table('users')
            ->join('reading_progress', 'users.id', '=', 'reading_progress.user_id')
            ->leftJoin('book_ratings', 'users.id', '=', 'book_ratings.user_id')
            ->leftJoin('book_comments', 'users.id', '=', 'book_comments.user_id')
            ->where(function ($query) {
                $query->whereNotNull('reading_progress.last_read_at')
                    ->orWhereNotNull('book_ratings.stars_given')
                    ->orWhereNotNull('book_comments.created_at');
            })
            ->distinct('users.id')
            ->count();

        $inactiveUsers = $totalUsers - $activeUsers;

        // Most Rated Books
        $mostRatedBooks = DB::table('books')
            ->leftJoin('book_ratings', 'books.book_id', '=', 'book_ratings.book_id')
            ->select('books.book_title', DB::raw('COUNT(book_ratings.rating_id) as total_ratings'))
            ->groupBy('books.book_id', 'books.book_title')
            ->orderByDesc('total_ratings')
            ->get();

        // Top Genres by Rating Activity
        $topGenres = DB::table('genres')
            ->select('genres.genre_name', DB::raw('COUNT(*) as total_ratings'))
            ->join('books', DB::raw("FIND_IN_SET(genres.genre_name, books.book_genres)"), '>', DB::raw('0'))
            ->join('book_ratings', 'books.book_id', '=', 'book_ratings.book_id')
            ->groupBy('genres.genre_name')
            ->orderByDesc('total_ratings')
            ->limit(3)
            ->get();

        $totalGenreRatings = $topGenres->sum('total_ratings');

        $genreStats = $topGenres->map(function ($genre) use ($totalGenreRatings) {
            $genre->percentage = $totalGenreRatings > 0
                ? round(($genre->total_ratings / $totalGenreRatings) * 100)
                : 0;
            return $genre;
        });

        return response()->json([
            'user_summary' => [
                'total' => $totalUsers,
                'active' => $activeUsers,
                'inactive' => $inactiveUsers,
            ],
            'most_rated_books' => $mostRatedBooks,
            'top_genres' => $genreStats,
        ]);
    }


    public function bookStatistics()
    {
        $books = Book::withCount([
            'comments',
            'ratings',
            'favorites',
            'readingProgress'
        ])->withAvg('ratings', 'stars_given')->get();

        return response()->json($books);
    }




}
