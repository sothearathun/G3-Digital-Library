<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book_Comments extends Model
{
    use HasFactory;

    protected $table = 'book_comments';
    protected $primaryKey = 'comment_id';
    protected $fillable = ['comment_text'];

    public function book()
    {
        return $this->belongsToMany(Book::class);
    }
    public function user()
    {
        return $this->belongsToMany(User::class);
    }
}
