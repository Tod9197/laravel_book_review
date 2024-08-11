@extends('layouts.admin')


@section('content')
<section class="user-edit-section py-6 rounded-md">
    <form id="RegisterForm" action="{{route('admin.users.update',$user->id)}}" method="post" enctype="multipart/form-data">
      @csrf
      @method('PATCH')
      <div class="flex px-6 pb-4 border-b items-center justify-between">
          <h3 class="sm:text-base md:text-lg lg:text-xl font-bold">プロフィール編集</h3>
            <button type="submit" class="py-2 px-6 sm:px-6 text-xs md:text-sm lg:text-base text-white font-semibold bg-blue-500 hover:bg-blue-400 rounded-md">
              更新する
            </button>
      </div>

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
            <input id="name" class="user-edit-name block w-full px-4 py-3 mb-2 text-sm bg-white border rounded" name="name" type="text" value={{old('name',$user->name)}}>
          </div>
          <div class="mb-6">
            <label class="block text-xs sm:text-sm font-medium mb-4" for="email">メールアドレス<span class="text-red-500 ml-2 text-xs">※ 必須</span></label>
            <input id="email" class="user-edit-email block w-full px-4 py-3 mb-2 text-sm bg-white border rounded" name="email" type="text" value={{old('email',$user->email)}}>
          </div>
          <div class="mb-6">
            <label class="block text-xs sm:text-sm font-medium mb-2" for="password">パスワード<span class="text-red-500 ml-2 text-xs">※ 必須</span></label>
            <span class="text-red-500 ml-2 text-xs">※ 入力がない(空欄)の場合、現在お使いのパスワードが継続されます</span>
            <input id="password" class="user-edit-password block w-full px-4 py-3 mt-4 mb-2 text-sm bg-white border rounded" name="password" type="password">
          </div>
          <div class="mb-6">
            <label class="block text-xs sm:text-sm font-medium mb-2" for="password">パスワード(確認)<span class="text-red-500 ml-2 text-xs">※ 必須</span></label>
            <span class="text-red-500 ml-2 text-xs">※ 入力がない(空欄)の場合、現在お使いのパスワードが継続されます</span>
            <input id="password_confirmation" class="user-edit-password block w-full px-4 py-3 mt-4 mb-2 text-sm bg-white border rounded" name="password_confirmation" type="password">
        </div>
        <div class="mb-6 md:mb-14">
            <label class="block text-xs sm:text-sm font-medium mb-4" for="image">プロフィール画像<span class="text-gray-500 ml-2 text-xs">(任意)</span>
            </label>
            <span class="text-red-500 ml-2 text-xs">※ 未選択の場合、現在お使いの画像が継続されます</span>
            <div class="img-flex items-end mt-4">
              <img id="previewImage" src="{{$user->img_path ? asset('storage/' . $user->img_path) : '/images/admin/noimage.jpg'}}" data-noimage="/images/admin/noimage.jpg" alt="ユーザー画像" class="rounded shadow-md w-32 md:w-40 uploadImg">
              <input id="image" class="block w-full px-4 py-3 mb-2 text-xs sm:text-sm" type="file" accept='image/*' name="image">
            </div>
          </div>

          </div>
    </form>
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
