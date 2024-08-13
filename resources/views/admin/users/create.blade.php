@extends('layouts.admin')

@section('content')
<section class="py-8 sign-up-section">
  <div class="container mx-auto">
    <div class="py-8 sm:py-10 bg-white rounded-md">
      <form id="RegisterForm" action="{{route('admin.users.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        {{-- <div class="flex px-10 pb-4 border-b items-center justify-between"> --}}
          <h1 class="text-lg md:text-xl lg:text-2xl font-semibold text-center sign-up-title">ユーザー登録</h1>
        {{-- </div> --}}

        <div class="pt-10 px-4 md:px-6 lg:px-12">
          {{-- エラーメッセージ --}}
          @if($errors->any())
          <div class="mb-8 py-4 px-6 border border-red-300 ng-red-50 rounded">
            <ul>
              @foreach($errors->all() as $error)
              <li class="text-red400">{{$error}}</li>
              @endforeach
            </ul>
          </div>
          @endif
          {{-- エラーメッセージここまで --}}

        <div class="mb-6">
            <label class="block text-xs sm:text-sm font-medium mb-4" for="name">名前<span class="text-red-500 ml-2 text-xs">※ 必須</span></label>
            <input id="name" class="block w-full px-4 py-3 mb-2 text-sm bg-white border rounded" name="name" type="text" value={{old('name')}}>
        </div>
        <div class="mb-6">
            <label class="block text-xs sm:text-sm font-medium mb-4" for="email">メールアドレス<span class="text-red-500 ml-2 text-xs">※ 必須</span></label>
            <input id="email" class="block w-full px-4 py-3 mb-2 text-sm bg-white border rounded" name="email" type="text" value={{old('email')}}>
        </div>
        <div class="mb-6">
            <label class="block text-xs sm:text-sm font-medium mb-4" for="password">パスワード<span class="text-red-500 ml-2 text-xs">※ 必須</span></label>
            <input id="password" class="block w-full px-4 py-3 mb-2 text-sm bg-white border rounded" name="password" type="password">
        </div>
        <div class="mb-6">
            <label class="block text-xs sm:text-sm font-medium mb-4" for="password">パスワード(確認)<span class="text-red-500 ml-2 text-xs">※ 必須</span></label>
            <input id="password_confirmation" class="block w-full px-4 py-3 mb-2 text-sm bg-white border rounded" name="password_confirmation" type="password">
        </div>
        <div class="mb-6 md:mb-14">
            <label class="block text-xs sm:text-sm font-medium mb-4" for="image">プロフィール画像<span class="text-gray-500 ml-2 text-xs">(任意)</span>
            </label>
            <div class="img-flex items-end">
              <img id="previewImage" src="/images/admin/noimage.jpg" data-noimage="/images/admin/noimage.jpg" alt="ユーザー画像" class="rounded shadow-md w-32 md:w-40 uploadImg">
              <input id="image" class="block w-full px-4 py-3 mb-2 text-xs sm:text-sm" type="file" accept='image/*' name="image">
            </div>
          </div>
        </div>
        <div><button type="submit" class="block w-2/5 py-3 text-center text-xs md:text-sm lg:text-base text-white font-semibold leading-none bg-blue-500 hover:bg-blue-400 rounded login-btn">登録する</button>
        </div>
      </form>
    </div>
  </div>
</section>

<script>
    // 画像プレビュー
    document.getElementById('image').addEventListener('change', e => {
        const previewImageNode = document.getElementById('previewImage')
        const fileReader = new FileReader()
        fileReader.onload = () => previewImageNode.src = fileReader.result
        if (e.target.files.length > 0) {
            fileReader.readAsDataURL(e.target.files[0])
        } else {
            previewImageNode.src = previewImageNode.dataset.noimage
        }
    })

    //フォームのEnterキーで送信を防止
    document.getElementById('RegisterForm').addEventListener('keypress',function(e){
      if(e.key === 'Enter' && e.target.type !== 'textarea'){
        e.preventDefault();
      }
    });
</script>
@endsection