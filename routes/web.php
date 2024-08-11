<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TopController;
use App\Http\Controllers\Admin\AdminPostController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ForgetPasswordController;
use App\Http\Controllers\Admin\ResetPasswordController;

// Route::get('/', function () {
//     return view('index');
// });

// トップ画面投稿一覧
Route::get('/',[TopController::class,'index'])->name('top.index');
//カテゴリー別の一覧ページ
Route::get('/categroy/{id}',[TopController::class,'categoryPage'])->name('category.index');
// 各投稿の詳細ページ
Route::get('/post/{id}',[TopController::class,'show'])->name('post.show');


// 投稿管理画面
Route::get('/admin/posts',[AdminPostController::class,'index'])->name('admin.posts.index')->middleware('auth');
// 新規作成ページ
Route::get('/admin/posts/create',[AdminPostController::class,'create'])->name('admin.posts.create')->middleware('auth');
// 新規登録
Route::post('/admin/posts',[AdminPostController::class,'store'])->name('admin.posts.store')->middleware('auth');
// 編集画面
Route::get('/admin/posts/{post}',[AdminPostController::class,'edit'])->name('admin.posts.edit')->middleware('auth');
//更新
Route::put('/admin/posts/{post}',[AdminPostController::class,'update'])->name('admin.posts.update')->middleware('auth');
// 削除
Route::delete('/admin/posts/{post}',[AdminPostController::class,'destroy'])->name('admin.posts.destroy')->middleware('auth');


//認証
//ユーザー登録画面表示
Route::get('/admin/users/create',[UserController::class,'create'])->name('admin.users.create')->middleware('guest');
// 不正なGETリクエストで404エラーを表示
Route::get('/admin/users', function() {
    abort(404);
});
//ユーザー登録
Route::post('/admin/users',[UserController::class,'store'])->name('admin.users.store')->middleware('guest');
//プロフィール編集画面表示
Route::get('/admin/users/{user}/edit',[UserController::class,'edit'])->name('admin.users.edit')->middleware('auth');
// プロフィール編集更新
Route::patch('/admin/users/{user}',[UserController::class,'update'])->name('admin.users.update')->middleware('auth');
//ログイン
Route::get('/admin/login',[AuthController::class,'showLoginForm'])->name('admin.login')->middleware('guest');
Route::post('/admin/login',[AuthController::class,'login']);
// ログアウト
Route::post('/admin/logout',[AuthController::class,'logout'])->name('admin.logout')
->middleware('auth');
// 退会確認画面
Route::get('/admin/users/withdraw',[AuthController::class,'withdrawConforim'])->name('admin.users.withdraw.confirm')->middleware('auth');
// 退会機能
Route::post('/admin/users/withdraw',[AuthController::class,'withdraw'])->name('admin.users.withdraw')->middleware('auth');
