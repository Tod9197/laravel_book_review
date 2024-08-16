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
    ->paginate(8);
    // バックエンドの投稿
    $backendPosts = Post::with('genres')
    ->where('category_id',$backendCategoryId)
    ->latest('updated_at')
    ->paginate(8);
    // サーバー/インフラの投稿
    $infraPosts = Post::with('genres')
    ->where('category_id',$infraCategoryId)
    ->latest('updated_at')
    ->paginate(8);
    //Webデザインの投稿
    $webdesignPosts = Post::with('genres')
    ->where('category_id',$webdesignCategoryId)
    ->latest('updated_at')
    ->paginate(8);
    //web技術全般/その他のの投稿
    $generalPosts = Post::with('genres')
    ->where('category_id',$generalCategoryId)
    ->latest('updated_at')
    ->paginate(8);

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
        ->paginate('12');

        return view('category',['posts' => $posts, 'category' => $category ]);
    }

    // 検索バーの表示
    public function search(Request $request){
        $query = $request->input('query');
        $categoryId = $request->input('category_id');
        $genreId = $request->input('genre_id');

        // 部分一致でタイトルや著者名を検索
        $posts = Post::where('title','LIKE',"%{$query}%")
        ->orWhere('author','LIKE',"%{$query}%")
        ->when($categoryId,function($query, $categoryId){
            return $query->where('category_id',$categoryId);
        })
        ->when($genreId,function($query,$genreId){
            return $query->whereHas('genres',function($q) use ($genreId){
                $q->where('genre_id',$genreId);
            });
        })
        ->orWhereHas('category',function($q) use ($query){
            $q->where('name','LIKE',"%{$query}%");
        })->get();

        // 検索結果
        return view('post.search_results',['posts' => $posts, 'query' => $query]);
    }
    
    //各投稿の詳細ページ
    public function show($id){
        $post = Post::with('genres','user')->findOrFail($id);
        $category = $post->category;

        // 同じカテゴリーに属する他の投稿を取得(現在の投稿は除外)
        $relatedPosts = Post::with('genres','user')
        ->where('category_id',$category->id)
        ->where('id','!=',$id)//現在の投稿は除外
        ->latest('updated_at')->limit(4)->get();

        return view('post.show',[
            'post' => $post,
            'category' => $category,
            'relatedPosts' => $relatedPosts
        ]);
    }
}
