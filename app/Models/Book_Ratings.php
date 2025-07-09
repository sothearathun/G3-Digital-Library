<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book_Ratings extends Model
{
    use HasFactory;

    protected $table = 'book_ratings';
    protected $primaryKey = 'rating_id';
    protected $fillable = ['stars_given'];

    public function book()
{
    return $this->belongsTo(Book::class, 'book_id');
}

public function user()
{
    return $this->belongsTo(User::class, 'user_id');
}

}
