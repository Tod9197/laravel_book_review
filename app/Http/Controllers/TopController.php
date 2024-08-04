<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class TopController extends Controller
{
    // トップ画面一覧表示
    public function index(){
    $frontendCategoryId = 1;//フロントエンドのカテゴリー
    $backendCategoryId = 2;//バックエンドのカテゴリー
    $infraCategoryId = 3;//サーバー/インフラのカテゴリー
    $webdesignCategoryId = 4; //Webデザインのカテゴリー
    $generalCategoryId = 5; //web技術全般/その他のカテゴリー

    // フロントエンドの投稿
    $frontendPosts = Post::with('genres')
    ->where('category_id',$frontendCategoryId)
    ->latest('updated_at')
    ->paginate(6);
    // バックエンドの投稿
    $backendPosts = Post::with('genres')
    ->where('category_id',$backendCategoryId)
    ->latest('updated_at')
    ->paginate(6);
    // サーバー/インフラの投稿
    $infraPosts = Post::with('genres')
    ->where('category_id',$infraCategoryId)
    ->latest('updated_at')
    ->paginate(6);
    //Webデザインの投稿
    $webdesignPosts = Post::with('genres')
    ->where('category_id',$webdesignCategoryId)
    ->latest('updated_at')
    ->paginate(6);
    //web技術全般/その他のの投稿
    $generalPosts = Post::with('genres')
    ->where('category_id',$generalCategoryId)
    ->latest('updated_at')
    ->paginate(6);

    return view('index',[
        'frontendPosts' => $frontendPosts,
        'backendPosts' => $backendPosts,
        'infraPosts' => $infraPosts,
        'webdesignPosts' => $webdesignPosts,
        'generalPosts' => $generalPosts,
    ]);
    }

    // カテゴリー毎の投稿一覧表示
    public function categoryPage($id){
        $category = Category::findOrFail($id);
        $posts = Post::with('genres')
        ->where('category_id',$id)
        ->latest('updated_at')
        ->paginate('10');

        return view('category',['posts' => $posts, 'category' => $category ]);
    }
}
