<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\Admin\StoreUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    // ユーザー登録画面表示
    public function create()
    {
        // if(!Auth::check()){
        //     return redirect()->route('admin.login');
        // }
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
        // return back()->with('success','ユーザー登録が完了ました');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
