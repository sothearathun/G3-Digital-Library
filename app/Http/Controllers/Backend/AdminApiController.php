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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\AdminUser;

class AdminApiController extends Controller
{
    // Define the shared path constant
    private $sharedPath = 'C:/wamp64/www/PHP_paragon_y2/Mission1-G3-Digital Library/shared-uploads';

    public function login(Request $request)
    {
        $admin = AdminUser::where('email', $request->email)->first();

        if (! $admin || ! Hash::check($request->password, $admin->password)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid credentials'
            ], 401);
        }

        $token = $admin->createToken('admin-token')->plainTextToken;

        return response()->json([
            'status' => 'success',
            'message' => 'Login successful',
            'token' => $token,
            'admin' => $admin
        ]);
    }

    public function logout()
    {
        Auth::guard('admin_api')->logout();

        return [
            'status' => 'success',
            'message' => 'Logout successful'
        ];
    }

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

        // Check if files are uploaded
        if (!$request->hasFile('file_path') || !$request->hasFile('book_cover')) {
            return response()->json(['error' => 'File upload failed'], 422);
        }

        // Handle book cover upload to shared path
        $bookCoverPath = null;
        if ($request->hasFile('book_cover')) {
            $bookCover = $request->file('book_cover');
            $coverName = time() . '_cover.' . $bookCover->getClientOriginalExtension();
            
            // Ensure directory exists
            if (!file_exists($this->sharedPath . '/book_covers')) {
                mkdir($this->sharedPath . '/book_covers', 0755, true);
            }
            
            $bookCover->move($this->sharedPath . '/book_covers', $coverName);
            $bookCoverPath = 'book_covers/' . $coverName;
        }

        // Handle book file upload to shared path
        $filePath = null;
        if ($request->hasFile('file_path')) {
            $bookFile = $request->file('file_path');
            $fileName = time() . '_book.' . $bookFile->getClientOriginalExtension();
            
            // Ensure directory exists
            if (!file_exists($this->sharedPath . '/book_files')) {
                mkdir($this->sharedPath . '/book_files', 0755, true);
            }
            
            $bookFile->move($this->sharedPath . '/book_files', $fileName);
            $filePath = 'book_files/' . $fileName;
        }

        // Normalize genres
        $genres = $validated['book_genres'] ?? [];
        if (is_string($genres)) {
            $genres = [$genres];
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
        $book->file_format = $request->file('file_path')->getClientOriginalExtension();

        $book->save();

        return response()->json([
            'message' => 'Book published successfully',
            'book' => [
                'id' => $book->book_id,
                'title' => $book->book_title,
                'author' => $book->author_name,
                'cover_path' => $book->book_cover,
                'file_path' => $book->file_path,
                'genres' => explode(',', $book->book_genres),
                'released' => $book->released_date,
                'pages' => $book->total_pages,
            ],
        ]);
    }

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
        $book->book_title = $validated['book_title'];
        $book->author_name = $author->author_name;
        $book->description = $validated['description'];
        $book->prologue = $validated['prologue'];
        $book->total_pages = $validated['total_pages'];
        $book->book_categories = $validated['book_categories'];
        $book->released_date = $validated['released_date'];
        $book->book_genres = isset($validated['book_genres']) ? implode(',', $validated['book_genres']) : $book->book_genres;

        // Replace file_path if new file uploaded
        if ($request->hasFile('file_path')) {
            $bookFile = $request->file('file_path');
            $fileName = time() . '_book.' . $bookFile->getClientOriginalExtension();
            
            // Ensure directory exists
            if (!file_exists($this->sharedPath . '/book_files')) {
                mkdir($this->sharedPath . '/book_files', 0755, true);
            }
            
            $bookFile->move($this->sharedPath . '/book_files', $fileName);
            $book->file_path = 'book_files/' . $fileName;
            $book->file_format = $bookFile->getClientOriginalExtension();
        }

        // Replace book_cover if new image uploaded
        if ($request->hasFile('book_cover')) {
            $bookCover = $request->file('book_cover');
            $coverName = time() . '_cover.' . $bookCover->getClientOriginalExtension();
            
            // Ensure directory exists
            if (!file_exists($this->sharedPath . '/book_covers')) {
                mkdir($this->sharedPath . '/book_covers', 0755, true);
            }
            
            $bookCover->move($this->sharedPath . '/book_covers', $coverName);
            $book->book_cover = 'book_covers/' . $coverName;
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

        // Delete files from shared path
        if ($book->file_path && file_exists($this->sharedPath . '/' . $book->file_path)) {
            unlink($this->sharedPath . '/' . $book->file_path);
        }
        if ($book->book_cover && file_exists($this->sharedPath . '/' . $book->book_cover)) {
            unlink($this->sharedPath . '/' . $book->book_cover);
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

        // Handle news cover upload to shared path
        $newsCoverPath = null;
        if ($request->hasFile('news_cover')) {
            $newsCover = $request->file('news_cover');
            $coverName = time() . '_cover.' . $newsCover->getClientOriginalExtension();
            
            // Ensure directory exists
            if (!file_exists($this->sharedPath . '/news_covers')) {
                mkdir($this->sharedPath . '/news_covers', 0755, true);
            }
            
            $newsCover->move($this->sharedPath . '/news_covers', $coverName);
            $newsCoverPath = 'news_covers/' . $coverName;
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
            'news_cover' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        $news->news_title = $validated['news_title'];
        $news->news_des = $validated['news_des'];
        $news->news_link = $validated['news_link'];

        // Handle news cover upload if provided
        if ($request->hasFile('news_cover')) {
            $newsCover = $request->file('news_cover');
            $coverName = time() . '_cover.' . $newsCover->getClientOriginalExtension();
            
            // Ensure directory exists
            if (!file_exists($this->sharedPath . '/news_covers')) {
                mkdir($this->sharedPath . '/news_covers', 0755, true);
            }
            
            $newsCover->move($this->sharedPath . '/news_covers', $coverName);
            $news->news_cover = 'news_covers/' . $coverName;
        }

        $news->save();

        return response()->json(['message' => 'News updated successfully', 'news' => $news]);
    }

    public function deleteNews($id)
    {
        $news = Digitales_News::find($id);
        if (!$news) {
            return response()->json(['message' => 'News not found'], 404);
        }

        // Delete file from shared path
        if ($news->news_cover && file_exists($this->sharedPath . '/' . $news->news_cover)) {
            unlink($this->sharedPath . '/' . $news->news_cover);
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

    public function addFaq(Request $request)
    {
        // Validate input
        $request->validate([
            'questions' => 'required|string|max:255',
            'answers' => 'required|string',
        ]);

        // Insert new FAQ
        $faqId = DB::table('faqs')->insertGetId([
            'questions' => $request->input('questions'),
            'answers' => $request->input('answers'),
            'status' => 1, // Assuming 1 is "active"
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return response()->json([
            'message' => 'FAQ added successfully',
            'faq_id' => $faqId
        ]);
    }

    public function deleteFaq($id)
    {
        $deleted = DB::table('faqs')->where('faq_id', $id)->delete();

        if ($deleted) {
            return response()->json(['message' => 'FAQ deleted successfully']);
        } else {
            return response()->json(['message' => 'FAQ not found'], 404);
        }
    }

    public function addTerms(Request $request)
    {
        // Validate incoming data
        $request->validate([
            'tc_des' => 'required|string|max:255',
        ]);

        // Insert into DB
        $tcId = DB::table('terms_conditions')->insertGetId([
            'tc_des' => $request->input('tc_des'), // ✅ use the correct field
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return response()->json([
            'message' => 'Terms and Conditions added successfully',
            'tc_id' => $tcId
        ]);
    }

    public function deleteTerms($id)
    {
        $deleted = DB::table('terms_conditions')->where('tc_id', $id)->delete();

        if ($deleted) {
            return response()->json(['message' => 'Terms and Conditions deleted successfully']);
        } else {
            return response()->json(['message' => 'T&C entry not found'], 404);
        }
    }
}