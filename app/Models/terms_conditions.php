<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class terms_conditions extends Model
{
    use HasFactory;

    protected $table = 'terms_conditions';
    protected $primaryKey = 'tc_id';
    protected $fillable = [
        'status'
    ];
    protected $casts = [
        'terms_conditions_points' => 'array'// Assuming terms_conditions_points is stored as a JSON array
    ];
}
