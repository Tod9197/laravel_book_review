<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class TopController extends Controller
{
    // トップ画面一覧表示
    public function index(){
    $categoryId = 1;//フロントエンドのカテゴリー
    $posts = Post::with('genres')->where('category_id',$categoryId)->latest('updated_at')->paginate(5);
    return view('index',['posts' => $posts]);
    }
}
