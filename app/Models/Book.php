<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use storage
use Illuminate\Support\Facades\Storage;

class Book extends Model
{
    use HasFactory;

    protected $table = 'books';
    protected $primaryKey = 'book_id';

    protected $fillable = [
        'book_title',
        'description',
        'prologue',
        'total_pages',
        'book_categories',
        'author_name',
        'released_date',
        'book_genres',
        'book_cover',
        'file_path',
        'file_format'
    ];

    protected $casts = [
        'created_at',
        'updated_at'
    ];

    // relationship
    public function genres()
    {
        return $this->belongsToMany(Genres::class);
    }
    public function authors()
    {
        return $this->belongsToMany(Author::class);
    }

    public function book_ratings()
    {
        return $this->hasMany(Book_Ratings::class);
    }

    public function book_favorites()
    {
        return $this->hasMany(Book_Favorites::class);
    }

    public function book_comments()
    {
        return $this->hasMany(Book_Comments::class);
    }

}