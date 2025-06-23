<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function analytics(){
        return view('admin.analytics');
    }

    public function publishBookForm(){

        $genres = DB::table('genres')->get();

        return view('admin.publishs',
         [
            'v_genres' => $genres
        ]
    );
    }
    public function processPublish(Request $request){

        $publish_book = new Book();

        $publish_book->book_title = $request->book_title;
        $publish_book->description = $request->description;
        $publish_book->total_pages = $request->total_pages;
        $publish_book->book_categories = $request->book_categories;
        $publish_book->author_name = $request->author_name;
        $publish_book->released_date = $request->released_date;
        
        // $publish_book->book_cover = $request->book_cover;
        // $publish_book->file_path = $request->file_path;
        // $publish_book->file_format = $request->file_format;
        // $publish_book->created_at = $request->created_at;
        // $publish_book->updated_at = $request->updated_at;

        // $chooseGenres = $request->input('book_genres');
        // $publish_book->book_genres = implode(',', $chooseGenres);

        if ($request->hasFile('book_cover')) {
            $bookCover = $request->file('book_cover');
            $coverName = time() . '_cover.' . $bookCover->getClientOriginalExtension();
            $bookCover->move(public_path('uploads/book_covers'), $coverName);
            $publish_book->book_cover = 'uploads/book_covers/' . $coverName;
        }

        if ($request->hasFile('file_path')) {
            $bookFile = $request->file('file_path');
            $fileName = time() . '_book.' . $bookFile->getClientOriginalExtension();
            $bookFile->move(public_path('uploads/book_files'), $fileName);
            $publish_book->file_path = 'uploads/book_files/' . $fileName;
            $publish_book->file_format = $bookFile->getClientOriginalExtension();
        }

        

         // Handle genres - check if array exists and is not empty
        $chooseGenres = $request->input('book_genres');
        if ($chooseGenres && is_array($chooseGenres)) {
            $publish_book->book_genres = implode(',', $chooseGenres);
        } else {
            $publish_book->book_genres = ''; // or set a default value
        }

        $publish_book->save();

        return redirect('/BookPublished');
    }
    public function bookPublished(){

        $bookPublished = DB::select("select * from `books` order by `book_id` desc");


        return view('admin.booksPublished',
        [
            'v_bookPublished' => $bookPublished
        ]
    );
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
