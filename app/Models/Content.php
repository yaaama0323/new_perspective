<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listpage extends Model
{
    public function user()
    {
        //Userモデルのデータを取得する
        return $this->belongsTo('App\User');
    }
}
