<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;


class AdminPostController extends Controller
{
    // 投稿管理一覧
    public function index(){
        $posts = Post::all();
        return view('admin.posts.index',['posts' => $posts]);
    }

    // 投稿作成画面
    public function create(){
        return view('admin.posts.create');
    }
}
