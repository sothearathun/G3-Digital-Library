<?php

namespace App\Http\Controllers\Web;
use Illuminate\Support\Facades\DB;
use App\Models\Reading_Progress;  
use App\Models\Book;
use App\Models\User;

// for pathing purposes
use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book_Comments;
use App\Models\Book_Favorites;
use App\Models\Book_Ratings;
use App\Models\Genre_Preferences;
// for pathing purposes

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Library_controller extends Controller
{   


    public function homepage() 
    {

        $trending_books = DB::select("select * from `books` where `book_categories` = 'trending' order by `book_id` desc limit 3;");
        $trending_books_with_ratings = array_map(function ($book) {
            $ratings = DB::select("select avg(stars_given) as average_rating from `book_ratings` where `book_id` = ?", [$book->book_id]);
            $book->average_rating = $ratings[0]->average_rating;

            $favorites = DB::select("select count(*) as total_favorites from `book_favorites` where `book_id` = ?", [$book->book_id]);
            $book->total_favorites = $favorites[0]->total_favorites;

            return $book;
        }, $trending_books);

        $best_selling_books = DB::select("select * from `books` where `book_categories` = 'best-selling' order by `book_id` desc limit 3;");
        $best_selling_books_with_ratings = array_map(function ($book) {
            $ratings = DB::select("select avg(stars_given) as average_rating from `book_ratings` where `book_id` = ?", [$book->book_id]);
            $book->average_rating = $ratings[0]->average_rating;

            $favorites = DB::select("select count(*) as total_favorites from `book_favorites` where `book_id` = ?", [$book->book_id]);
            $book->total_favorites = $favorites[0]->total_favorites;

            return $book;
        }, $best_selling_books);

        $newly_added_books = DB::select("select * from `books` where `book_categories` = 'newly-added' order by `book_id` desc limit 3;");
        $newly_added_books_with_ratings = array_map(function ($book) {
            $ratings = DB::select("select avg(stars_given) as average_rating from `book_ratings` where `book_id` = ?", [$book->book_id]);
            $book->average_rating = $ratings[0]->average_rating;

            $favorites = DB::select("select count(*) as total_favorites from `book_favorites` where `book_id` = ?", [$book->book_id]);
            $book->total_favorites = $favorites[0]->total_favorites;

            return $book;
        }, $newly_added_books);


        $popular_authors = DB::select("select * from `authors` where `author_categories` = 'popular-author' order by `author_id` desc limit 3;");

        $digitales_news = DB::select("select * from `digitales_news` order by `news_id` desc limit 3;");

        $genres = DB::table('genres')->pluck('genre_name'); // or adjust column name as needed


        return view('frontend-pages\homepage', 
        [
            'v_trending_books' => $trending_books,
            'v_best_selling_books' => $best_selling_books,
            'v_newly_added_books' => $newly_added_books,
            'v_popular_authors' => $popular_authors,
            'v_digitales_news' => $digitales_news,
            'genres' => $genres
        ]
        );
    }

        // In your controller
    public function saveGenres(Request $request)
    {
        $genres = $request->input('genres'); // array of selected genres
        $user_id = auth()->id();

        // Save as comma-separated string
        $prefered_genres = is_array($genres) ? implode(',', $genres) : '';

        // Save to genre_preferences table
        Genre_Preferences::create([
            'user_id' => $user_id,
            'prefered_genres' => $prefered_genres,
        ]);

        // Optionally redirect or return view
        return redirect()->route('homepage');
    }



    public function profile($user_id = null)
    {
        $user_id = $user_id ?? auth()->id();
        
        // Fetch the actual user object from the database
        $user = User::where('id', $user_id)->first();
        $continueReading = Reading_Progress::where('user_id', $user_id)
        ->join('books', 'reading_progress.book_id', '=', 'books.book_id')
        ->select('reading_progress.*', 'books.book_title', 'books.book_cover')
        ->get();
        $favoriteBooks = Book_Favorites::where('user_id', $user_id)
        ->join('books', 'book_favorites.book_id', '=', 'books.book_id')
        ->select('book_favorites.*', 'books.book_title', 'books.book_cover')
        ->get();

        $userId = $user_id; // or auth()->id()

        $totalBooksRead = DB::table('reading_progress')
            ->where('user_id', $userId)
            ->where('completion_percentage', 100)
            ->distinct('book_id')
            ->count('book_id');

        $totalBooksRated = DB::table('book_ratings')
            ->where('user_id', $userId)
            ->distinct('book_id')
            ->count('book_id');

        $totalBooksCommented = DB::table('book_comments')
            ->where('user_id', $userId)
            ->distinct('book_id')
            ->count('book_id');

        $genre_preferences = Genre_Preferences::where('user_id', $user_id)->get();

        
        // Check if user exists
        if (!$user) {
            abort(404, 'User not found');
        }
        
        // Pass the user object to the view
        return view('frontend-pages.profile', compact('user', 'continueReading', 'favoriteBooks', 'totalBooksRead', 'totalBooksRated', 'totalBooksCommented', 'genre_preferences'));
    }



    public function search_page() 
    {
        $filter = [
            'genres' => DB::table('genres')->get()
        ]; 

        $display_results = DB::table('books')->get();

        return view('frontend-pages.search_page',
        [
            'f_genres' => $filter['genres'],
            'v_display_results' => $display_results,
            'results' => null, // No search results initially
            'show_initial' => true // Flag to show initial state
        ]);
    }
    // Method to process search using GET method
public function processSearch(Request $request)
{
    $query = $request->input('query');
    $selectedGenres = $request->input('book_genres', []);
    $category = $request->input('category');

    $booksQuery = DB::table('books');

    // Mode 1: Keyword search
    if ($query && trim($query) !== '') {
        $booksQuery->where(function ($q) use ($query) {
            $q->where('book_title', 'like', '%' . $query . '%')
              ->orWhere('author_name', 'like', '%' . $query . '%');
        });
    }

    // Mode 2: Genre + Category filter
    if (!empty($selectedGenres)) {
        $booksQuery->where(function ($q) use ($selectedGenres) {
            foreach ($selectedGenres as $genre) {
                $q->orWhere('book_genres', 'like', '%' . $genre . '%');
            }
        });
    }

    if ($category) {
        switch ($category) {
            case 'newly-added':
                $booksQuery->where('book_categories', 'newly-added');
                break;
            case 'trending':
                $booksQuery->where('book_categories', 'trending'); // assuming you track views
                break;
            case 'best-selling':
                $booksQuery->where('book_categories', 'best-selling'); // assuming you track sales
                break;
        }
    }

    // If no input at all, redirect back
    if (empty($query) && empty($selectedGenres) && !$category) {
        return redirect()->route('search_page');
    }

    $books = $booksQuery->get();

    return view('frontend-pages.search_page', [
        'v_display_results' => $books,
        'searchQuery' => $query,
        'selectedGenres' => $selectedGenres,
        'selectedCategory' => $category,
        'show_initial' => false
    ]);
}




    public function viewbook(Request $request) 
    {
        // return view('frontend-pages\viewbook');
        
        $bookId = $request->route('book_id');

        // Fetch the book details from the database
        $book = DB::table('books')->where('book_id', $bookId)->first();
        $book->author_bio_link = DB::table('authors')
            ->where('author_name', $book->author_name)
            ->value('author_bio_link');

        $relatedBooks = DB::table('books')
            ->where('author_name', $book->author_name)
            ->where('book_id', '!=', $book->book_id)
            ->limit(2)
            ->get();

        $comments = DB::table('book_comments')
    ->join('users', 'book_comments.user_id', '=', 'users.id')
    ->where('book_comments.book_id', $bookId)
    ->select('book_comments.*', 'users.name as username')
    ->limit(3)
    ->latest()
    ->get();

        $averageRating = DB::table('book_ratings')
    ->where('book_id', $bookId)
    ->avg('stars_given');

        $totalRatings = DB::table('book_ratings')
    ->where('book_id', $bookId)
    ->count();

        $totalFavorites = DB::table('book_favorites')
    ->where('book_id', $bookId)
    ->select(DB::raw('count(*) as total_favorite'))
    ->first();


        return view('frontend-pages\viewbook', ['book' => $book, 'relatedBooks' => $relatedBooks, 'comments' => $comments, 'averageRating' => $averageRating,
        'totalRatings' => $totalRatings,
        'totalFavorites' => $totalFavorites
    ]);
    }
    public function addfavorite(Request $request)
    {
        $bookId = $request->route('book_id');
        $userId = auth()->id();

        $favorite = DB::table('book_favorites')
            ->where('book_id', $bookId)
            ->where('user_id', $userId)
            ->first();

        if ($favorite) {
            // If the book is already a favorite, delete the record
            DB::table('book_favorites')
                ->where('book_id', $bookId)
                ->where('user_id', $userId)
                ->delete();
        } else {
            // If the book is not a favorite, insert a new record
            DB::table('book_favorites')->insert([
                'book_id' => $bookId,
                'user_id' => $userId,
                'is_favorited' => true
            ]);
        }

        return redirect('/viewbook/' . $bookId);
    }
    public function ratings(Request $request)
    {
        $bookID = $request->route('book_id');
        $userID = auth()->id();
        $book = Book::find($bookID);

        $rating = new Book_Ratings();
        $rating->stars_given = $request->rating;
        $rating->user_id = $userID; // Save the user ID
        $rating->book_id = $bookID; // Save the book ID

        $rating->save();

       return redirect('/viewbook/' . $bookID);
    }
    public function writeComment(Request $request)
    {
        $bookID = $request->route('book_id');
        $userID = auth()->id();
        $book = Book::find($bookID);

        $comment = new Book_Comments();
        $comment->comment_title = $request->comment_title;
        $comment->comment_text = $request->comment_text;
        $comment->user_id = $userID; // Save the user ID
        $comment->book_id = $bookID; // Save the book ID

        $comment->save();

       return redirect('/viewbook/' . $bookID);
    }

    public function readbook(Request $request) 
        {
            $bookId = $request->route('book_id');
            
            // Fetch the book details from the database
            $book = DB::table('books')->where('book_id', $bookId)->first();
            
            if (!$book) {
                abort(404, 'Book not found');
            }
            
            // Get user's reading progress if exists
            $readingProgress = null;
            if (Auth::check()) {
                $readingProgress = Reading_Progress::where('book_id', $bookId)
                    ->where('user_id', Auth::id())
                    ->first();
            }
            
            return view('frontend-pages.readbook', [
                'book' => $book,
                'reading_progress' => $readingProgress
            ]);
        }
    public function storeReadingProgress(Request $request) 
    {


        $request->validate([
            'book_id' => 'required|exists:books,book_id',
            'current_page' => 'required|integer|min:1',
            'total_pages' => 'required|integer|min:1'
        ]);
        
        // Calculate completion percentage and pages remaining
        $completionPercentage = ($request->current_page / $request->total_pages) * 100;
        $pageRemaining = $request->total_pages - $request->current_page;
        
        // Update or create reading progress using the model
        Reading_Progress::updateOrCreate(
            [
                'book_id' => $request->book_id,
                'user_id' => Auth::id()
            ],
            [
                'current_page' => $request->current_page,
                'page_remaining' => $pageRemaining,
                'completion_percentage' => $completionPercentage,
                'last_read_at' => now()
            ]
        );
        
        return redirect()->back();
    }





    public function aboutus() 
    {
         return view('frontend-pages\aboutus');
    }
    public function faq() 
    {
        //  return view('frontend-pages\FAQ');

        $faqs = DB::table('faqs')
            ->where('status', 1)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('frontend-pages\FAQ', ['faqs' => $faqs]);
    }
    public function terms_conditions() 
    {
        // return view('frontend-pages\terms_conditions');
        
        $terms = DB::table('terms_conditions')->orderBy('tc_id')->get();

        return view('frontend-pages.terms_conditions', [
            'terms' => $terms
        ]);
    }
    
}
