<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Author;
use App\Models\Digitales_News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function analytics(){
        return view('admin.analytics');
    }




   public function publishBookForm(){                    
    $genres = DB::table('genres')->get();          
    return view('admin.publishForm', [
        'v_genres' => $genres,
        'book' => null, // No book data for new book
        'action' => 'publish' // Default action
    ]);     
}     

public function processPublish(Request $request){           
    if ($request->input('action') == 'publish') {
        // Code to publish a new book              
        $author = Author::findOrCreateByName($request->author_name);              
        $publish_book = new Book();              
        $publish_book->book_title = $request->book_title;
        $publish_book->description = $request->description;
        $publish_book->prologue = $request->prologue;
        $publish_book->total_pages = $request->total_pages;
        $publish_book->book_categories = $request->book_categories;
        $publish_book->author_name = $author->author_name;
        $publish_book->released_date = $request->released_date;              

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

        // Handle genres
        $chooseGenres = $request->input('book_genres');
        if ($chooseGenres && is_array($chooseGenres)) {
            $publish_book->book_genres = implode(',', $chooseGenres);
        } else {
            $publish_book->book_genres = '';
        }

        $publish_book->save();

    } elseif ($request->input('action') == 'edit') {
        // Code to edit an existing book
        $book_id = $request->input('book_id'); // Get book ID from hidden field
        $publish_book = Book::find($book_id);
        
        if (!$publish_book) {
            return redirect()->back()->with('error', 'Book not found');
        }

        $author = Author::findOrCreateByName($request->author_name);
        
        $publish_book->book_title = $request->book_title;
        $publish_book->description = $request->description;
        $publish_book->prologue = $request->prologue;
        $publish_book->total_pages = $request->total_pages;
        $publish_book->book_categories = $request->book_categories;
        $publish_book->author_name = $author->author_name;
        $publish_book->released_date = $request->released_date;

        // Handle book cover - only update if new file uploaded
        if ($request->hasFile('book_cover')) {
            // Delete old cover if exists
            if ($publish_book->book_cover && file_exists(public_path($publish_book->book_cover))) {
                unlink(public_path($publish_book->book_cover));
            }
            
            $bookCover = $request->file('book_cover');
            $coverName = time() . '_cover.' . $bookCover->getClientOriginalExtension();
            $bookCover->move(public_path('uploads/book_covers'), $coverName);
            $publish_book->book_cover = 'uploads/book_covers/' . $coverName;
        }

        // Handle book file - only update if new file uploaded
        if ($request->hasFile('file_path')) {
            // Delete old file if exists
            if ($publish_book->file_path && file_exists(public_path($publish_book->file_path))) {
                unlink(public_path($publish_book->file_path));
            }
            
            $bookFile = $request->file('file_path');
            $fileName = time() . '_book.' . $bookFile->getClientOriginalExtension();
            $bookFile->move(public_path('uploads/book_files'), $fileName);
            $publish_book->file_path = 'uploads/book_files/' . $fileName;
            $publish_book->file_format = $bookFile->getClientOriginalExtension();
        }

        // Handle genres
        $chooseGenres = $request->input('book_genres');
        if ($chooseGenres && is_array($chooseGenres)) {
            $publish_book->book_genres = implode(',', $chooseGenres);
        } else {
            $publish_book->book_genres = '';
        }

        $publish_book->save();
    }                   

    return redirect('/BooksPublished');     
}      

    public function editBookForm($book_id)     
    {         
        $book = Book::find($book_id);
        $genres = DB::table('genres')->get(); // Add this line!
        
        if (!$book) {
            return redirect('/BooksPublished')->with('error', 'Book not found');
        }
        
        return view('admin.publishForm', [ // Use same view as publishBookForm
            'book' => $book,
            'v_genres' => $genres, // Pass genres for dropdown
            'action' => 'edit'
        ]);     
    }

    public function booksPublished(){

        $bookPublished = DB::select("select * from `books` order by `book_id` desc");


        return view('admin.booksPublished',
        [
            'v_bookPublished' => $bookPublished
        ]
    );
    }
    public function processDeleteBook(Request $request){

        // get the book_id from the route parameter
        $bookId = $request->route('book_id');
        Book::where('book_id', $bookId)->delete();

        // Redirect back to the books published page
        return redirect('/BooksPublished');
    }




    public function usersRecords(){
        return view('admin.usersRecords');
    }
    public function statistics(){
        return view('admin.statistics');
    }
    public function guidelines(){
        return view('admin.guidelines');
    }
    public function authors(){

        $authors = DB::table('authors')
        ->select('authors.*', DB::raw('(SELECT COUNT(*) FROM books WHERE books.author_name = authors.author_name) as books_count'))
        ->orderBy('author_id', 'desc')
        ->get();

        return view('admin.authors',
        [
            'v_authors' => $authors
        ]
    );
    }

    public function publishNewsForm(){

        return view('admin.publishNewsForm',

    );
    }

    public function processPublishNews(Request $request){

        $publish_news = new Digitales_News();

        $publish_news->news_title = $request->news_title;
        $publish_news->news_des = $request->news_des;
        $publish_news->news_link = $request->news_link;

        if ($request->hasFile('news_cover')) {
            $newsCover = $request->file('news_cover');
            $coverName = time() . '_cover.' . $newsCover->getClientOriginalExtension();
            $newsCover->move(public_path('uploads/news_covers'), $coverName);
            $publish_news->news_cover = 'uploads/news_covers/' . $coverName;
        }

        $publish_news->save();

        return redirect('/DigitalesNews');

    }

    public function digitalesNews(){
        $newsPublished = DB::select("select * from `digitales_news` order by `news_id` desc");


        return view('admin.digitalesNews',
        [
            'v_news' => $newsPublished
        ]
    );
    }
}
