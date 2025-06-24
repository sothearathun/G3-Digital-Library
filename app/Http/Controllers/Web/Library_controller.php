<?php

namespace App\Http\Controllers\Web;
use Illuminate\Support\Facades\DB;  

// for pathing purposes
use App\Http\Controllers\Controller;
// for pathing purposes

use Illuminate\Http\Request;

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
            'v_digitales_news' => $digitales_news
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

         return view('frontend-pages\search_page',
         [
            'f_genres' => $filter['genres']
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
        // return view('frontend-pages\readbook');
        
        $bookId = $request->route('book_id');

        // Fetch the book details from the database
        $book = DB::table('books')->where('book_id', $bookId)->first();
        
        return view('frontend-pages\readbook', ['book' => $book]);
    }




    public function aboutus() 
    {
         return view('frontend-pages\aboutus');
    }

    public function faq() 
    {
        //  return view('frontend-pages\FAQ');

        $faqs = DB::table('faq')
            ->where('is_published', 1)
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
