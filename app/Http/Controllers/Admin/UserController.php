<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\Admin\StoreUserRequest;
use App\Http\Requests\Admin\UpdateUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    // ユーザー登録画面表示
    public function create()
    {
        return view('admin.users.create');
    }

    // ユーザー登録処理
    public function store(StoreUserRequest $request)
    {
        $validated = $request->validated();

        // 画像がアップロードされた場合
        if($request->hasFile('image')){
            $validated['img_path'] = $request->file('image')->store('users','public');
        } else {
            $validated['img_path'] = null;//画像がアップロードされなかった場合はnullを設定
        }
        
        $validated['password'] = Hash::make($validated['password']);
        $user = User::create($validated);
        // そのままログイン認証
        Auth::login($user);

        return redirect()->route('admin.posts.index')->with('success','ユーザー登録が完了しました');
    }

    // ユーザーのプロフィール編集画面表示
    public function edit(User $user)
    {
        // 現在ログインしているユーザー以外のプロフィール編集を防ぐ
        if(Auth::id() !== $user->id){
            return redirect()->route('top.index')->with('error','不正な操作です');
        }
        return view('admin.users.edit',compact('user'));
    }
    
    // ユーザー情報変更
    public function update(UpdateUserRequest $request, User $user)
    {
        // 現在ログインしているユーザー以外のプロフィール編集を防ぐ
        if(Auth::id() !== $user->id){
            return redirect()->route('top.index')->with('error','不正な操作です');
        }

        $validated = $request->validated();

        // 画像がアップロードされた場合
        if($request->hasFile('image')){
            //古い画像を削除
            if($user->img_path && \Storage::exists('public/' . $user->img_path)){
                \Storage::delete('public/' . $user->img_path);
            }

            // 新しい画像を保存
            $validated['img_path'] = $request->file('image')->store('users','public');
        } else {
            // 画像がアップロードされなかった場合は既存のパスを保持
            $validated['img_path'] = $user->img_path;
        }

        //パスワードが入力されている場合のみハッシュ化
        if(!empty($validated['password'])){
            $validated['password'] = Hash::make($validated['password']);
        } else {
            // パスワードが空の場合、既存のパスワードを保持
            unset($validated['password']);
        }

        // ユーザー情報を更新
        $user->update($validated);

        return redirect()->route('admin.posts.index',$user->id)->with('success','プロフィールが更新されました');
    }

}
