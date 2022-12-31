<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
// use宣言追加

use App\Models\Users;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
   


    public function index()
    {        
         $users = DB::select('select * from review');
        if(\Auth::user()->role === 0){return redirect('/dashboard');}
        else{
        return view('admin_delete', compact('users'));
        }
    }
 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        Review::find($id)->delete();
  
        return response()->json(['success'=>'投稿を削除しました']);
    }
}
