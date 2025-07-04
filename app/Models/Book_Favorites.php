<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book_Favorites extends Model
{
    use HasFactory;

    protected $table = 'book_favorites';
    protected $primaryKey = 'favorite_id';

    protected $fillable = [
        'is_favorited' => 'boolean',
    ];

    public function book()
    {
        return $this->belongsToMany(Book::class);
    }
    public function user()
    {
        return $this->belongsToMany(User::class);
    }
}
