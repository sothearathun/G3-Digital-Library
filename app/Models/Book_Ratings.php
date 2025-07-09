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

    public function user()
    {
        return $this->belongsToMany(User::class);
    }
}
