<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre_Preferences extends Model
{
    use HasFactory;

    protected $table = "genre_preferences";
    protected $primaryKey = "preference_id";
    protected $fillable = ['prefered_genres', 'user_id']; //this is store as text
    
    public function genre()
    {
        return $this->belongsToMany(Genres::class, 'genre_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
