<?php

namespace App\Http\Controllers\Frontend;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Reading_Progress;
use App\Models\Genre_Preferences;



class LibraryApiController extends Controller
{
    public function index()
    {
        return response()->json(['message' => 'It works!']);
    }
    
    public function homepage()
    {
        return response()->json([
            'trending_books' => DB::table('books')->where('book_categories', 'trending')->orderBy('book_id', 'desc')->limit(3)->get(),
            'best_selling_books' => DB::table('books')->where('book_categories', 'best-selling')->orderBy('book_id', 'desc')->limit(3)->get(),
            'newly_added_books' => DB::table('books')->where('book_categories', 'newly-added')->orderBy('book_id', 'desc')->limit(3)->get(),
            'popular_authors' => DB::table('authors')->where('author_categories', 'popular-author')->orderBy('author_id', 'desc')->limit(3)->get(),
            'digitales_news' => DB::table('digitales_news')->orderBy('news_id', 'desc')->limit(3)->get()
        ]);
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        
        if (!$query || trim($query) == '') {
            return response()->json(['error' => 'No query provided'], 400);
        }

        $books = DB::table('books')
            ->where('book_title', 'like', '%' . $query . '%')
            ->orWhere('author_name', 'like', '%' . $query . '%')
            ->get();

        return response()->json(['results' => $books]);
    }

    public function viewBook($book_id)
    {
        $book = DB::table('books')->where('book_id', $book_id)->first();

        if (!$book) {
            return response()->json(['error' => 'Book not found'], 404);
        }

        $book->author_bio_link = DB::table('authors')
            ->where('author_name', $book->author_name)
            ->value('author_bio_link');

        return response()->json(['book' => $book]);
    }

    public function readBook($book_id)
    {
        $book = DB::table('books')->where('book_id', $book_id)->first();

        if (!$book) {
            return response()->json(['error' => 'Book not found'], 404);
        }

        $readingProgress = null;

        if (Auth::check()) {
            $readingProgress = Reading_Progress::where('book_id', $book_id)
                ->where('user_id', Auth::id())
                ->first();
        }

        return response()->json([
            'book' => $book,
            'reading_progress' => $readingProgress
        ]);
    }

    public function storeReadingProgress(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,book_id',
            'user_id' => 'required|integer|min:1',
            'current_page' => 'required|integer|min:1',
            'page_remaining' => 'required|integer|min:1',
        ]);
        $totalPages = $request->current_page + $request->page_remaining;

            if ($totalPages == 0) {
                return response()->json(['error' => 'Total pages cannot be zero'], 400);
            }

            $completionPercentage = ($request->current_page / $totalPages) * 100;
        $progress = Reading_Progress::updateOrCreate(
            [
                'book_id' => $request->book_id,
                'user_id' => $request->user_id
            ],
            [
                'current_page' => $request->current_page,
                'page_remaining' => $request->page_remaining,
                'completion_percentage' => $completionPercentage,
                'last_read_at' => now()
            ]
        );


        return response()->json(['message' => 'Progress saved', 'progress' => $progress]);
    }

    public function faq()
    {
        $faqs = DB::table('faqs')
            ->where('status', 1)
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json(['faqs' => $faqs]);
    }




    public function termsConditions()
    {
        $terms = DB::table('terms_conditions')->orderBy('tc_id')->get();

        return response()->json(['terms' => $terms]);
    }

    



    public function saveGenres(Request $request)
    {
        $userId = Auth::id();

        if (!$userId) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $genre_name = $request->input('genre_name'); // expecting an array of genre names or ids

        if (!is_array($genre_name) || empty($genre_name)) {
            return response()->json(['error' => 'Genres must be a non-empty array'], 422);
        }

        $preferredGenres = implode(',', $genre_name);
        $preference = Genre_Preferences::updateOrCreate(
            ['user_id' => $userId],
            ['prefered_genres' => $preferredGenres]
        );

        return response()->json([
            'message' => 'Genres saved successfully',
            'data' => $preference
        ]);
    }
}
