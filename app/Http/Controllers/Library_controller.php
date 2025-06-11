<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;

class Library_controller extends Controller
{
    public function index()
    {
        
        return view('homepage'); 
    }
}