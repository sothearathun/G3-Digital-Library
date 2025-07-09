<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Author;
use App\Models\Digitales_News;
use App\Models\terms_conditions;
use App\Models\faqs;
use App\Models\Genres;
use App\Models\Genre_Preferences;
use App\Models\User;
use App\Models\Reading_Progress;
use App\Models\Book_Ratings;
use App\Models\Book_Comments;
use App\Models\Book_Favorites;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class AdminController extends Controller
{
    public function analytics()
{
    // user charts
    $users = User::all();
    $user = User::find(1);
    $user->totalUser = $users->count();

    $user->activeUsers = DB::table('users')
    ->join('reading_progress', 'users.id', '=', 'reading_progress.user_id')
    ->leftJoin('book_ratings', 'users.id', '=', 'book_ratings.user_id')
    ->leftJoin('book_comments', 'users.id', '=', 'book_comments.user_id')
    ->where(function ($query) {
        $query->where('reading_progress.last_read_at', '!=', null)
            ->orWhere('book_ratings.stars_given', '!=', null)
            ->orWhere('book_comments.created_at', '!=', null);
    })
    ->distinct('users.id')
    ->count();

    $user->noneActiveUsers = $user->totalUser - $user->activeUsers;

   $mostRatedBook = DB::table('books')
    ->leftJoin('book_ratings', 'books.book_id', '=', 'book_ratings.book_id')
    ->select('books.book_title', DB::raw('COUNT(book_ratings.rating_id) as total_ratings'))
    ->groupBy('books.book_id', 'books.book_title')
    ->orderByDesc('total_ratings')
    ->get();

    $topGenres = DB::table('genres')
    ->select('genres.genre_name', DB::raw('COUNT(*) as total_ratings'))
    ->join('books', DB::raw("FIND_IN_SET(genres.genre_name, books.book_genres)"), '>', DB::raw('0'))
    ->join('book_ratings', 'books.book_id', '=', 'book_ratings.book_id')
    ->groupBy('genres.genre_name')
    ->orderByDesc('total_ratings')
    ->limit(3)
    ->get();

    // Calculate total for percentage
    $totalRatings = $topGenres->sum('total_ratings');

    // Add percentage to each genre
    $genreStats = $topGenres->map(function ($genre) use ($totalRatings) {
        $genre->percentage = $totalRatings > 0 ? round(($genre->total_ratings / $totalRatings) * 100) : 0;
        return $genre;
    });

    return view('admin.analytics', compact('users', 'user', 'mostRatedBook', 'topGenres', 'genreStats'));
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



    public function statistics(){
    $v_books = Book::all();

    // Fetch book details
    $v_books = $v_books->map(function ($book) {
        $book->total_comments = DB::table('book_comments')
            ->where('book_id', $book->book_id)
            ->count();

        $book->avg_rating = DB::table('book_ratings')
            ->where('book_id', $book->book_id)
            ->avg('stars_given');

        $book->total_favorites = DB::table('book_favorites')
            ->where('book_id', $book->book_id)
            ->count();

        $book->total_reading = DB::table('reading_progress')
            ->where('book_id', $book->book_id)
            ->count();

        return $book;
    });

    return view('admin.statistics', compact('v_books'));
}





    public function guidelines()
    {
        $v_terms_conditions = terms_conditions::where('status', 1)->get();
        $v_faq = faqs::where('status', 1)->get();

        return view('admin.guidelines', compact('v_terms_conditions', 'v_faq'));
    }
    // terms and conditions
    // delete tersms and conditions
    public function deleteTC($tc_id) // Get from route parameter
    {
        terms_conditions::where('tc_id', $tc_id)->update(['status' => 0]);
        return redirect()->back();
    }
    // add terms and conditions
    public function addTC(Request $request) 
    {
        $addTC = new terms_conditions;
        $addTC->tc_des = $request->tc_des;
        $addTC->status = 1;

        $addTC->save();
        return redirect()->back();
    }

    public function deleteFAQ($faq_id) // Get from route parameter
    {
        faqs::where('faq_id', $faq_id)->update(['status' => 0]);
        return redirect()->back();
    }
    public function addFAQ(Request $request) 
    {
        $addFAQ = new faqs;
        $addFAQ->questions = $request->questions;
        $addFAQ->answers = $request->answers;
        $addFAQ->status = 1;

        $addFAQ->save();
        return redirect()->back();
    }




    public function authors()
    {
        $authors = DB::table('authors')
        ->select('authors.*', DB::raw('(SELECT COUNT(*) FROM books WHERE books.author_name = authors.author_name) as books_count'))
        ->orderBy('author_id', 'desc')
        ->get();

        $categories = Author::distinct('author_categories')->pluck('author_categories')->toArray();

        return view('admin.authors',
        [
            'v_authors' => $authors,
            'categories' => $categories
        ]
        );
    }
    public function updateAuthorCategory(Request $request, $authorId)
    {
        $author = Author::findOrFail($authorId);
        $author->author_categories = $request->input('author_categories');
        $author->save();

        $categories = Author::distinct('author_categories')->pluck('author_categories')->toArray();
        $v_authors = Author::all(); // or whatever query you need to get the authors
        return view('admin.authors', compact('v_authors', 'categories'));
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
