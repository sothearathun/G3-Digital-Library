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

    protected $casts = [
        'last_read_at' => 'datetime',
        'completion_percentage' => 'decimal:2'
    ];

    // Define proper relationships
    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id', 'book_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public static function findOrCreateByID($progress_id)
    {
        $progressID = $progress_id;

        // Find existing progress record
        $reading_progress = self::find($progressID);

        if (!$reading_progress) {
            // Create new progress record
            $reading_progress = new self();
            $reading_progress->progress_id = $progressID;
            $reading_progress->save();
        }

        return $reading_progress;
    }

    // Helper method to calculate pages remaining
    public function calculatePagesRemaining($totalPages)
    {
        return max(0, $totalPages - $this->current_page);
    }

    // Helper method to calculate completion percentage
    public function calculateCompletionPercentage($totalPages)
    {
        if ($totalPages <= 0) return 0;
        return round(($this->current_page / $totalPages) * 100, 2);
    }
}