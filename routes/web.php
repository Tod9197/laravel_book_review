<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TopController;
use App\Http\Controllers\Admin\AdminPostController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AuthController;

// Route::get('/', function () {
//     return view('index');
// });

// トップ画面投稿一覧
Route::get('/',[TopController::class,'index'])->name('top.index');
//カテゴリー別の一覧ページ
Route::get('/categroy/{id}',[TopController::class,'categoryPage'])->name('category.index');


// 投稿管理画面
Route::get('/admin/posts',[AdminPostController::class,'index'])->name('admin.posts.index')->middleware('auth');
// 新規作成ページ
Route::get('/admin/posts/create',[AdminPostController::class,'create'])->name('admin.posts.create')->middleware('auth');
// 新規登録
Route::post('/admin/posts',[AdminPostController::class,'store'])->name('admin.posts.store');
// 編集画面
Route::get('/admin/posts/{post}',[AdminPostController::class,'edit'])->name('admin.posts.edit')->middleware('auth');
//更新
Route::put('/admin/posts/{post}',[AdminPostController::class,'update'])->name('admin.posts.update');
// 削除
Route::delete('/admin/posts/{post}',[AdminPostController::class,'destroy'])->name('admin.posts.destroy');


//認証
//ユーザー登録画面表示
Route::get('/admin/users/create',[UserController::class,'create'])->name('admin.users.create');
//ユーザー登録
Route::post('/admin/users',[UserController::class,'store'])->name('admin.users.store');
//ログイン
Route::get('/admin/login',[AuthController::class,'showLoginForm'])->name('admin.login')->middleware('guest');
Route::post('/admin/login',[AuthController::class,'login']);
// ログアウト
Route::post('/admin/logout',[AuthController::class,'logout'])->name('admin.logout');
