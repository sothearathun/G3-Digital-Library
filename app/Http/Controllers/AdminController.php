<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function analytics(){
        return view('admin.analytics');
    }
    public function publish(){
        return view('admin.publishs');
    }
    public function bookPublished(){
        return view('admin.booksPublished');
    }
    public function userRecords(){
        return view('admin.userRecord');
    }
    public function statistics(){
        return view('admin.statistic');
    }
    public function guidelines(){
        return view('admin.guideline');
    }
    public function author(){
        return view('admin.authors');
    }
    public function digitalNews(){
        return view('admin.digitalsNews');
    }
}
