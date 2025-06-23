<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Digitales_News extends Model
{
    use HasFactory;

    protected $table = 'digitales_news';
    protected $primaryKey = 'news_id';

    protected $fillable = [
        'news_title',
        'news_des',
        'news_link',
        'news_cover'
    ];
}
