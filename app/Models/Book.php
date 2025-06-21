<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use storage
use Illuminate\Support\Facades\Storage;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_title',
        'description',
        'isbn',
        'released_date',
        'book_categories',
        'author_id',
        'publisher',
        'file_path',
        'file_size',
        'file_format',
        'page_count',
        'cover_image'
    ];

    protected $casts = [
        'released_date' => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

}