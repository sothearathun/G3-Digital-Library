<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class faq extends Model
{
    use HasFactory;

    protected $table = 'faq';
    protected $primaryKey = 'faq_id';
    protected $casts = [
        'questions' => 'array', // Assuming questions is stored as a JSON array
        'answers' => 'array', // Assuming answers is stored as a JSON array
        'status' => 'boolean' // Assuming status is a boolean field
    ];
}
