<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reading_Progress extends Model
{
    use HasFactory;

    protected $table = "reading_progress";
    protected $primaryKey = "progress_id";

    protected $fillable = [
        'book_id',
        'user_id',
        'current_page',
        'page_remaining',
        'completion_percentage',
        'last_read_at'
    ];

    public function books()
    {
        return $this->belongsToMany(Book::class);
    }

    // public function users()
    // {
    //     return $this->belongsToMany(User::class);
    // }


    public static function findOrCreateByID($progress_id)
    {
        $progressID = $progress_id;

        // Find existing progress record
        $reading_progress = self::find($progressID);

        if (!$reading_progress) {
            // Create new progress record
            $reading_progress = self::create(['progress_id' => $progressID]);
        }

        return $reading_progress;
    }

}
