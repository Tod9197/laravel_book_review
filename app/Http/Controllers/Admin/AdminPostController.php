<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\StorePostRequest;
use App\Models\Post;
use App\Models\Genre;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;


class AdminPostController extends Controller
{
    // 投稿管理一覧
    public function index(Request $request){  

        $user = $request->user();
        $posts = Post::where('user_id',$user->id)->latest('updated_at')->paginate(5);
        $categories = Category::all();
        return view('admin.posts.index',
        ['posts' => $posts,
        'categories' => $categories,
    ]);
    }

    // 投稿作成画面
    public function create(){
        $categories = Category::all();
        $genres = Genre::all();
        return view('admin.posts.create',['categories' => $categories,'genres' => $genres]);
    }

    // 新規投稿作成
    public function store(StorePostRequest $request){
        $validated = $request->validated();
        $validated['user_id'] = Auth::id();

        // 画像選択した場合はimg_pathを設定する
        if($request->hasFile('image')){
        $validated['img_path'] = $request->file('image')->store('posts','public');
        } else {
            // 画像未選択の場合はnullを返す
            $validated['img_path'] = null;
        }
         // 投稿新規作成
        $post = Post::create($validated);
        // カテゴリーとジャンル紐付け
        $post->category()->associate($validated['category_id']);
        $post->genres()->sync($validated['genres'] ?? []);   
        return to_route('admin.posts.index')->with('success','投稿しました');
    }

// 指定した投稿の編集画面
    public function edit(Post $post){
        $categories = Category::all();
        $genres = Genre::all();
        return view('admin.posts.edit' ,
        ['post' => $post, 
        'categories' => $categories,
        'genres' => $genres]);
    }

// 指定した投稿の更新処理
    public function update(StorePostRequest $request, string $id)
    {
    $post = Post::findOrFail($id);
    $updateData = $request->validated();
    // 画像を変更する場合
    if ($request->hasFile('image')) {
        // 変更前の画像を削除
        if ($post->img_path) {
            Storage::disk('public')->delete($post->img_path);
        }
        // 変更後の画像をアップロード、保存パスを更新対象データにセット
        $updateData['img_path'] = $request->file('image')->store('posts', 'public');
        } elseif ($request->has('deleteImage')) {
        // 画像削除がリクエストされている場合
        if ($post->img_path) {
            Storage::disk('public')->delete($post->img_path);
            $updateData['img_path'] = null; // データベースの img_path を null に設定
        }
    }
    // 投稿を更新
    $post->category()->associate($updateData['category_id']);
    $post->update($updateData);
    $post->genres()->sync($updateData['genres'] ?? []);    
    
    return to_route('admin.posts.index')->with('success', '投稿を更新しました');
    }

    // 指定したidの投稿の削除処理
    public function destroy(string $id){
        $post = Post::findOrFail($id);
        if($post->img_path){
            Storage::disk('public')->delete($post->img_path);
        }
        // 関連するジャンルの削除
        $post->genres()->detach();
        // 投稿の削除
        $post->delete();

        return to_route('admin.posts.index')->with('success','投稿を削除しました');
    }
}
