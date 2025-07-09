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
        'author_name',
        'author_categories',
        'author_image',
        'author_bio_link'
    ];

    // relationship
    public function books()
    {
        return $this->belongsToMany(Book::class);
    }

     // Method to find or create author (case insensitive)
    public static function findOrCreateByName($name)
    {
        $trimmedName = trim($name);
        
        // Find existing author (case insensitive)
        $author = self::whereRaw('LOWER(author_name) = ?', [strtolower($trimmedName)])->first();
        
        if (!$author) {
            // Create new author with proper case
            $author = self::create(['author_name' => $trimmedName]);
        }
        
        return $author;
    }
}
