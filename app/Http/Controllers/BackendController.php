<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BackendController extends Controller
{
    public function analytics(){
        return view('backend.analytics');
    }
    public function publish(){
        return view('backend.publish');
    }
    public function bookPublished(){
        return view('backend.bookPublished');
    }
    public function userRecords(){
        return view('backend.userRecords');
    }
    public function statistics(){
        return view('backend.statistics');
    }
    public function guidelines(){
        return view('backend.guidelines');
    }
    public function author(){
        return view('backend.author');
    }
    public function digitalNews(){
        return view('backend.digitalNews');
    }
}
