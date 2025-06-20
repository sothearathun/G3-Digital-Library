<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;  


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
    
}
