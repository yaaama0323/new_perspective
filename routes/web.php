<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContentsController;
use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/dashboard', function () {
  return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
  Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
  Route::put('/profile', [ProfileController::class, 'introduciton'])->name('profile_edit');
});

require __DIR__.'/auth.php';

Route::get('/', function () {
  return view('index');
});

Route::get('/search', function () {
  return view('search');
});

Route::get('/welcome', function () {
  return view('welcome');
});

Route::post('/confirm', [ReviewController::class,'confirm'])->middleware(['auth', 'verified'])->name('confirm');;//ログインしていなければリダイレクト
Route::post('/profile_confirm', [SelfIntroductionController::class,'introduction_update']);;
Route::get('/review', [ReviewController::class,'review'])->middleware(['auth', 'verified'])->name('review');;
Route::get('/my_review', [ReviewController::class,'my_review'])->middleware(['auth', 'verified'])->name('review');;
Route::post('/complete', [ReviewController::class,'create']);
Route::get('/complete', function(){
  return view('complete');
});

Route::get('/search', [SearchController::class,'getIndex']);
Route::get('/introduction', function () {
  return view('introduction');
});

Route::get('/review_edit/{id}/', [ReviewController::class,'update']);
Route::post('/review_edit_complete', [ReviewController::class,'updatecomp']);
Route::post('/delete/{id}/', [ReviewController::class,'delete']);
Route::get('/uploadImg', [UploadImgController::class,'uploadImg']);
Route::post('/uploadImg', [UploadImgController::class,'uploadImg']);
Route::get('/detail/{id}/', [ReviewController::class,'detail'])->middleware(['auth', 'verified'])->name('detail');;
Route::get('admin_delete', [AdminController::class, 'index'])->middleware(['auth', 'verified'])->name('admin');
Route::delete('admin_delete/{id}', [AdminController::class, 'delete'])->name('users.delete');
