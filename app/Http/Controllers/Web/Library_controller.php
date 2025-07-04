<?php

namespace App\Http\Controllers\Web;
use Illuminate\Support\Facades\DB;
use App\Models\Reading_Progress;  
use App\Models\Book;

// for pathing purposes
use App\Http\Controllers\Controller;
// for pathing purposes

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Library_controller extends Controller
{   
    public function homepage() 
    {


        $trending_books = DB::select("select * from `books` where `book_categories` = 'trending' order by `book_id` desc limit 3;");
        $best_selling_books = DB::select("select * from `books` where `book_categories` = 'best-selling' order by `book_id` desc limit 3;");
        $newly_added_books = DB::select("select * from `books` where `book_categories` = 'newly-added' order by `book_id` desc limit 3;");

        $popular_authors = DB::select("select * from `authors` where `author_categories` = 'popular-author' order by `author_id` desc limit 3;");

        $digitales_news = DB::select("select * from `digitales_news` order by `news_id` desc limit 3;");

        return view('frontend-pages\homepage', 
        [
            'v_trending_books' => $trending_books,
            'v_best_selling_books' => $best_selling_books,
            'v_newly_added_books' => $newly_added_books,
            'v_popular_authors' => $popular_authors,
            'v_digitales_news' => $digitales_news,
            
        ]
        );
    }



    public function profile() 
    {
         return view('frontend-pages\profile');
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
        
        // Initialize books variable
        $books = collect();
        
        // If there's a search query, filter the results
        if ($query && trim($query) != '') {
            $books = DB::table('books')
                ->where('book_title', 'like', '%' . $query . '%')
                ->orWhere('author_name', 'like', '%' . $query . '%')
                ->get();
        } else {
            // If no search query, redirect back to search page
            return redirect()->route('search_page');
        }
        
        
        // Pass all required variables to the view
        return view('frontend-pages.search_page', [
            'v_display_results' => $books,
            'show_initial' => false // Flag to show search results
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
        return view('frontend-pages\viewbook', ['book' => $book]);
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
