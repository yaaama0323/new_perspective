<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review_search extends Model
{
    use HasFactory;
    protected $table = 'review';
    protected $fillable = ['id','game_title', 'star','review_title','coment','use_id'];

    public $timestamps = false;
}
