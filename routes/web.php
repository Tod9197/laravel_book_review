<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminPostController;

Route::get('/', function () {
    return view('welcome');
});

// 投稿管理
Route::get('/admin/posts',[AdminPostController::class,'index']);
Route::get('/admin/posts/create',[AdminPostController::class,'create']);
