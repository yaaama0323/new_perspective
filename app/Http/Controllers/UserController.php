<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
// use宣言追加

use App\Models\Users;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function getUsersBySearchName($userName)
    {
        $users = $this->user->where('name', 'like', '%' . $userName . '%')->withCount('items')->orderBy('items_count', 'desc')->get(); //出品数もほしいため、withCountでitemテーブルのレコード数も取得
        return response()->json($users);
    }





}
