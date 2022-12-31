<?php
namespace App\Http\Controllers;
//use App\Http\Controller;
use Request;
use App\Models\review_search;



use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Validator;


class SearchController extends Controller
{


  


  public function getIndex()
  {
    $model = new review_search();
      // 検索するテキスト取得
      $search = Request::get('s');
      $query = Review_search::query();
      
      // 検索するテキストが入力されている場合のみ
      if(!empty($search)) {
          $query->where('game_title', 'like', '%'.$search.'%');
      }
      $data = $query->get();
      
     
      return view('search.index', compact('data', 'search'));
      
      
  }




}