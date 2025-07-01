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
        'tc_des',
        'status'
    ];
}
