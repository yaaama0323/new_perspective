<?php

namespace App\Http\Controllers;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect; 
class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function edit(Request $request)
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     *
     * @param  \App\Http\Requests\ProfileUpdateRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProfileUpdateRequest $request)
    {
        $request->user()->fill($request->validated());
        $request->validate([
            'favorite_game' => 'string|max:50',
            'introduction' => 'string|max:300',
        ]);
        $user = Auth::user();
        $user->favorite_game = $request->input('favorite_game');
        $user->introduction = $request->input('introduction');
        $user->save();

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],

        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }



    public function profile_confirm(Request $request)
    {
        return view('profile_confirm', [
            'user' => $request->user(),
        ]);
    }




    public function updatecomp(Request $request)
    {
        $data = $request->all();
        // dd($request);
        // dd($request,$request->id);
        $request->validate(
            [
                'name' => 'required',
                'kana' => 'required',
                'tel' => 'nullable|numeric',
                'address' => 'required|email',
                'content' => 'required',
            ],
            [
                'name.required' => '氏名の入力必須項目です。',
                'kana.required' => 'フリガナの入力は必須項目です。',
                'address.required' => 'メールアドレスの入力は必須項目です。',
                'address.email' => 'メールアドレスは正しく入力してください。',
                'content.required' => '問い合わせ内容の入力は必須項目です。',
                'tel.numeric' => '電話番号は数字で入力してください。',
            ]
        );

        // 値を代入
        $post = SelfIntroduction::find($request->id);
        $post->name = $request->name;
        $post->user_id = $request->user_id;
        $post->name = $request->name;
        $post->email = $request->address;
        $post->body = $request->content;

        // 保存
        $post->save();



        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }





    public function introduction(Request $request, User $user)
    {
        $request->validate([
            'favorite_game' => 'string|max:255',
            'introduction' => 'string|max:255',
        ]);

        try {
            $user = Auth::user();
            $user->favorite_game = $request->input('favorite_game');
            $user->introduction = $request->input('introduction');
            $user->save();

        } catch (\Exception $e) {
            return back()->with('msg_error', 'プロフィールの更新に失敗しました')->withInput();
        }

        return Redirect::route('profile.edit')->with('msg_success', 'プロフィールの更新が完了しました');
    }


    public function upload(Request $request)
    {
        // ディレクトリ名
        $dir = 'sample';

        // アップロードされたファイル名を取得
        $file_name = $request->file('image')->getClientOriginalName();

        // 取得したファイル名で保存
        $request->file('image')->storeAs('public/' . $dir, $file_name);

        return redirect('/');
    }
}