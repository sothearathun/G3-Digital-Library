<?php

namespace App\Http\Controllers\Web;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;  


use Illuminate\Http\Request;

class Library_controller extends Controller
{
    public function homepage() 
    {
        $TrendingBook = DB::table('books')->get();
        $Author_pic_name = DB::table('authors')->get();

        return view('frontend-pages/homepage', [

            'v_TrendingBook' => $TrendingBook,
            'v_authors' => $Author_pic_name
        ]); 
    }
}
