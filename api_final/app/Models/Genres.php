<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genres extends Model
{
    use HasFactory;

    protected $table = 'genres';
    protected $primaryKey = 'genre_id';

    protected $fillable = [
        'name',
        'status'
    ];

    public function books()
    {
        return $this->belongsToMany(Book::class);
    }
}
