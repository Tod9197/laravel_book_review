<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminPostController;

Route::get('/', function () {
    return view('welcome');
});

// 投稿管理
Route::get('/admin/posts',[AdminPostController::class,'index'])->name('admin.posts.index');
// 新規作成ページ
Route::get('/admin/posts/create',[AdminPostController::class,'create'])->name('admin.posts.create');
// 新規登録
Route::post('/admin/posts',[AdminPostController::class,'store'])->name('admin.posts.store');
// 編集画面
Route::get('/admin/posts/{post}',[AdminPostController::class,'edit'])->name('admin.posts.edit');
//更新
Route::put('/admin/posts/{post}',[AdminPostController::class,'update'])->name('admin.posts.update');
// 削除
Route::delete('/admin/posts/{post}',[AdminPostController::class,'destroy'])->name('admin.posts.destroy');
