<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // ログイン画面
    public function showLoginForm(){
        return view('admin.login');
    }

    // ログイン処理
    public function login(Request $request){
        // バリデーション
        $credentials = $request->validate([
            'email' => ['required','email'],
            'password' => ['required'],
        ]);

        // ログイン情報が正しいか
        // Auth::attemptメソッドでログイン情報が正しいか検証
        if(Auth::attempt($credentials)){
            //セッションを再生成する処理(セキュリティ対策)
            $request->session()->regenerate();

            return redirect()->intended('/');
        }
            // ログイン情報が正しくない場合のみ実行される処理(returnすると以降の処理は実行されない)
            //一つ前のページ(ログイン画面)にリダイレクト
            //その際にwithErrorsを使ってエラーメッセージを手動で指定
            //リダイレクト後のビュー内でold関数によって直前の入力内容を取得できる項目をonlyInputで指定
            return back()->withErrors([
                'email' => 'メールアドレスまたはパスワードが正しくありません',
            ])->onlyInput('email');
        }

    // ログアウト
    public function logout(Request $request){
        Auth::logout();
        //現在使っているセッションを無効化(セキュリティ強化)
        $request->session()->invalidate();
        // セッション無効化を再生成(セキュリティ対策)
        $request->session()->regenerateToken();

        return redirect()->route('top.index');
    }

    // 退会確認画面
    public function withdraw(){
        return view('admin.users.withdraw');
    }
}
