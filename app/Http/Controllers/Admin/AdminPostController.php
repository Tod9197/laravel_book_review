<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\StorePostRequest;
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

    // 新規投稿作成
    public function store(StorePostRequest $request){
        $validated = $request->validated();

        // 画像選択した場合はimg_pathを設定する
        if($request->hasFile('image')){
        $validated['img_path'] = $request->file('image')->store('posts','public');
        } else {
            // 画像未選択の場合はnullを返す
            $validated['img_path'] = null;
        }
        // 投稿新規作成
        Post::create($validated);
        return to_route('admin.posts.index')->with('success','投稿しました');
    }
}
