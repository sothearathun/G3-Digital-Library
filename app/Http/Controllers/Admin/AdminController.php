<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Author;
use App\Models\Digitales_News;
use App\Models\terms_conditions;
use App\Models\faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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

// stores to uploads for now
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

        // defined shared path for uploads
        $sharedPath = 'C:/wamp64/www/PHP_paragon_y2/Mission1-G3-Digital Library/shared-uploads';
        
        if ($request->hasFile('book_cover')) {
            $bookCover = $request->file('book_cover');
            $coverName = time() . '_cover.' . $bookCover->getClientOriginalExtension();
            
             // Ensure directory exists
            if (!file_exists($sharedPath . '/book_covers')) {
                mkdir($sharedPath . '/book_covers', 0755, true);
            }
            
            $bookCover->move($sharedPath . '/book_covers', $coverName);
            $publish_book->book_cover = 'book_covers/' . $coverName;
        }
        
        if ($request->hasFile('file_path')) {
            $bookFile = $request->file('file_path');
            $fileName = time() . '_book.' . $bookFile->getClientOriginalExtension();
            
            // Ensure directory exists
            if (!file_exists($sharedPath . '/book_files')) {
                mkdir($sharedPath . '/book_files', 0755, true);
            }
            
            $bookFile->move($sharedPath . '/book_files', $fileName);
            $publish_book->file_path = 'book_files/' . $fileName;
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
        
        // find the book by id
        $book = Book::find($request->book_id);
        if (!$book) {
            return redirect('/BooksPublished')->with('error', 'Book not found.');
        }

        // update author if changed
        $author = Author::findOrCreateByName($request->author_name);
        $book->author_name = $author->author_name;

        // update basic fields
        $book->book_title = $request->book_title;
        $book->description = $request->description;
        $book->prologue = $request->prologue;
        $book->total_pages = $request->total_pages;
        $book->book_categories = $request->book_categories;
        $book->released_date = $request->released_date;

        // defined shared path for uploads
         $sharedPath = 'C:/wamp64/www/PHP_paragon_y2/Mission1-G3-Digital Library/shared-uploads';

        //  replace book cover if provided
        if ($request->hasFile('book_cover')) {
            $bookCover = $request->file('book_cover');
            $coverName = time() . '_cover.' . $bookCover->getClientOriginalExtension();
            
            // Ensure directory exists
            if (!file_exists($sharedPath . '/book_covers')) {
                mkdir($sharedPath . '/book_covers', 0755, true);
            }
            
            $bookCover->move($sharedPath . '/book_covers', $coverName);
            $book->book_cover = 'book_covers/' . $coverName;
        }

        // replace book file if provided
        if ($request->hasFile('file_path')) {
            $bookFile = $request->file('file_path');
            $fileName = time() . '_book.' . $bookFile->getClientOriginalExtension();
            
            // Ensure directory exists
            if (!file_exists($sharedPath . '/book_files')) {
                mkdir($sharedPath . '/book_files', 0755, true);
            }
            
            $bookFile->move($sharedPath . '/book_files', $fileName);
            $book->file_path = 'book_files/' . $fileName;
            $book->file_format = $bookFile->getClientOriginalExtension();
        }

        // Handle genres
        $chooseGenres = $request->input('book_genres');
        $book->book_genres = is_array($chooseGenres) ? implode(',', $chooseGenres) : '';

        $book->save();   
    }
    
    return redirect('/BooksPublished');
}

public function editBookForm(Request $request){
    // get the book_id from the route parameter
    $bookId = $request->route('book_id');
    $genres = DB::table('genres')->get();
    $book = Book::find($bookId);
    if (!$book) {
        return redirect('/BooksPublished')->with('error', 'Book not found.');
    }

    return view('admin.publishForm', [
        'book' => $book, 
        'action' => 'edit',
        'v_genres' => $genres
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





    public function guidelines()
    {
        $v_terms_conditions = terms_conditions::where('status', 1)
            ->orderByDesc('tc_id')
            ->latest()
            ->first();
        
        $v_faq = faq::where('status', 1)
            ->orderByDesc('faq_id')
            ->latest()
            ->first();


        return view('admin.guidelines', compact('v_terms_conditions', 'v_faq'));
    }
    // public function updateTermsConditions(Request $request, $id)
    // {
    //     $validated = $request->validate([
    //         'bullet_points' => 'required|array',
    //         'bullet_points.*' => 'required|string|max:1000',
    //     ]);

    //     // Deactivate old version
    //     terms_conditions::where('status', 1)->update(['status' => 0]);

    //     // Create new version
    //     $new = new terms_conditions();
    //     $new->terms_conditions_points = $validated['bullet_points'];
    //     $new->status = 1;
    //     $new->save();

    //     return redirect()->back();
    // }

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
            ['news' => null, // No news data for new news
            'action' => 'publish'] // Default action
        );
    }
    public function editNewsForm(Request $request){
        // get the news_id from the route parameter
        $newsId = $request->route('news_id');
        $news = Digitales_News::find($newsId);
        if (!$news) {
            return redirect('/DigitalesNews')->with('error', 'News not found.');
        }

        return view('admin.publishNewsForm', [
            'news' => $news, 
            'action' => 'edit'
        ]);
    }
    public function processPublishNews(Request $request){
    
    if ($request->input('action') == 'publish') {

        $publish_news = new Digitales_News();

        $publish_news->news_title = $request->news_title;
        $publish_news->news_des = $request->news_des;
        $publish_news->news_link = $request->news_link;

       // defined shared path for uploads
        $sharedPath = 'C:/wamp64/www/PHP_paragon_y2/Mission1-G3-Digital Library/shared-uploads';
        
        if ($request->hasFile('news_cover')) {
            $newsCover = $request->file('news_cover');
            $coverName = time() . '_cover.' . $newsCover->getClientOriginalExtension();
            
             // Ensure directory exists
            if (!file_exists($sharedPath . '/news_covers')) {
                mkdir($sharedPath . '/news_covers', 0755, true);
            }
            
            $newsCover->move($sharedPath . '/news_covers', $coverName);
            $publish_news->news_cover = 'news_covers/' . $coverName;
        }

        $publish_news->save();
    } elseif ($request->input('action') == 'edit') {

        // get the id
        $newsId = $request->input('news_id');
        $publish_news = Digitales_News::find($newsId);

        // populate the news data
        if (!$publish_news) {
            return redirect('/DigitalesNews')->with('error', 'News not found.');
        }

        $publish_news->news_title = $request->news_title;
        $publish_news->news_des = $request->news_des;
        $publish_news->news_link = $request->news_link;

        // defined shared path for uploads
        $sharedPath = 'C:/wamp64/www/PHP_paragon_y2/Mission1-G3-Digital Library/shared-uploads';
        
        if ($request->hasFile('news_cover')) {
            $newsCover = $request->file('news_cover');
            $coverName = time() . '_cover.' . $newsCover->getClientOriginalExtension();
            
             // Ensure directory exists
            if (!file_exists($sharedPath . '/news_covers')) {
                mkdir($sharedPath . '/news_covers', 0755, true);
            }
            
            $newsCover->move($sharedPath . '/news_covers', $coverName);
            $publish_news->news_cover = 'news_covers/' . $coverName;
        }

        $publish_news->save();
    }

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
    public function deleteNews(Request $request){

        // get the news_id from the route parameter
        $newsId = $request->route('news_id');
        Digitales_News::where('news_id', $newsId)->delete();

        // Redirect back to the news published page
        return redirect('/DigitalesNews');
    }
}
