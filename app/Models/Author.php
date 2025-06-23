<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $table = 'authors';
    protected $primaryKey = 'author_id';

    protected $fillable = [
        'name',
        'status',
        'image',
    ];

    // relationship
    public function books()
    {
        return $this->belongsToMany(Book::class);
    }
}
