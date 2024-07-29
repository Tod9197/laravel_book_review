<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminPostController;

Route::get('/', function () {
    return view('welcome');
});

// 投稿管理
Route::get('/admin/posts',[AdminPostController::class,'index'])->name('admin.posts.index');
Route::get('/admin/posts/create',[AdminPostController::class,'create'])->name('admin.posts.create');
Route::post('/admin/posts',[AdminPostController::class,'store'])->name('admin.posts.store');
