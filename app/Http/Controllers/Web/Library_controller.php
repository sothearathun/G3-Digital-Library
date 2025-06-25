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
        $TrendingBook = DB::table('books')->get();
        $Author_pic_name = DB::table('authors')->get();

        return view('frontend-pages\homepage', [

            'v_TrendingBook' => $TrendingBook,
            'v_authors' => $Author_pic_name
        ]); 
    }

    public function profile() 
    {
         return view('frontend-pages\profile');
    }

    public function search_page() 
    {
         return view('frontend-pages\search_page');
    }

    public function viewbook(Request $request) 
    {
        // return view('frontend-pages\viewbook');
        
        $bookId = $request->query('id');

        $book = DB::table('books')
            ->join('authors', 'books.author_id', '=', 'authors.author_id')
            ->select('books.*', 'authors.author_name')
            ->where('books.book_id', $bookId)
            ->first();

        if (!$book) {
            abort(404, 'Book not found');
        }

        return view('frontend-pages.viewbook', ['book' => $book]);
    }

    public function aboutus() 
    {
         return view('frontend-pages/aboutus');
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


    public function pick_genre() 
    {
        // actions
         return view('frontend-pages/pick_genre');
    }


    public function login_signup_page() 
    {
        //actions
         return view('auth/login_signup_page');
    }

    }


