<?php
namespace App\Http\Controllers;

//use App\Http\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Users;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Validator;


class ReviewController extends Controller
{
  public function review()
  {
    $review = DB::select('select * from review');
    $data = ['review' => $review];
    return view('review', $data);
  }

  public function my_review()
  {
    $my_review = DB::select('select * from review');
    $data = ['my_review' => $my_review];
    return view('my_review', $data);
  }

  public function search_sub()
  {
    $review_list = DB::select('select * from review');
    $data = ['review_list' => $review_list];
    return view('index', $data);
  }

  public function find(Request $request)
  {
    return view('search.find', ['input' => '', 'id' => $request->id]);
  }


  public function confirm(Request $request)
  {
    $data = $request->all();

    $request->validate(
      [
        'game_title' => 'required|max:50',
        'star' => 'required|numeric',
        'review_title' => 'required|max:50',
        'coment' => 'required|max:300',

      ],
      [
        'game_title.required' => 'ゲーム名の入力は必須です。',
        'game_title.max' => 'ゲーム名は50文字以内で入力ください。',
        'star' => '星を選択してください。',
        'review_title.required' => 'レビュータイトルの入力は必須です。',
        'review_title.max' => 'レビュータイトルは50文字以内で入力ください。',
        'coment.required' => 'レビュー内容の入力は必須です。',
        'coment.max' => 'レビュー内容は300文字以内でご記入ください。',
      ]
    );

    return view('confirm')->with($data);
  }

  public function create(Request $request)
  {
    $post = new Review;
    $post->game_title = $request->game_title;
    $post->star = $request->star;
    $post->review_title = $request->review_title;
    $post->coment = $request->coment;
    $post->user_id = $request->user_id;
    $post->save();

    $request->session()->regenerateToken();

    return view('complete');
  }


  // 編集画面
  public function update($id)
  {
    $user = Review::find($id);
    return view('review_edit')->with('user', $user);
  }

  // 編集完了画面
  public function updatecomp(Request $request)
  {
    $data = $request->all();
    // dd($request);
    // dd($request,$request->id);
    $request->validate(
      [
        'game_title' => 'required|max:50',
        'star' => 'required|numeric',
        'review_title' => 'required|max:50',
        'coment' => 'required|max:300',

      ],
      [
        'game_title.required' => 'ゲーム名の入力は必須です。',
        'game_title.max' => 'ゲーム名は50文字以内で入力ください。',
        'star' => '星を選択してください。',
        'review_title.required' => 'レビュータイトルの入力は必須です。',
        'review_title.max' => 'レビュータイトルは50文字以内で入力ください。',
        'coment.required' => 'レビュー内容の入力は必須です。',
        'coment.max' => 'レビュー内容は300文字以内でご記入ください。',
      ]
    );

    // 値を代入
    $post = Review::find($request->id);
    $post->game_title = $request->game_title;
    $post->star = $request->star;
    $post->review_title = $request->review_title;
    $post->coment = $request->coment;
    $post->user_id = $request->user_id;

    $post->save();
    return view('review_edit_complete');
  }

  public function delete($id)
  {
    $book = Review::find($id);
    $book->delete();

    return redirect('my_review');
  }



  public function detail($id)
  {
    $users = DB::select('select * from users');
    $data = ['users' => $users];
    $user = review::find($id);
    return view('detail', $data)->with('user', $user);
  }




}
