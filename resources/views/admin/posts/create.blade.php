@extends('layouts.admin')

@section('content')
<section class="py-6">
  <div class="container mx-auto">
    <div class="py-6 bg-white rounded-md">
      <form action="{{route('admin.posts.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="flex px-6 pb-4 border-b items-center justify-between">
          <h3 class="text-xl font-bold">書籍登録</h3>
          <div><button type="submit" class="py-2 px-6 text-xm text-white font-semibold bg-blue-400 rounded-md">投稿する</button>
          </div>
        </div>

        <div class="pt-4 px-6">
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
            <label class="block text-sm font-medium mb-4" for="title">書籍タイトル<span class="text-red-500 ml-2 text-xs">※ 必須</span></label>
            <input id="title" class="block w-3/5 px-4 py-3 mb-2 text-sm bg-white border rounded" name="title" type="text" value={{old('title')}}>
          </div>

          <div class="mb-6">
            <label class="block text-sm font-medium mb-4" for="title">書籍URL<span class="text-gray-500 ml-2 text-xs">(任意:AmazonなどのURL)</span></label>
            <input id="url" class="block w-3/5 px-4 py-3 mb-2 text-sm bg-white border rounded" name="url" type="text" value={{old('url')}}>
          </div>

          <div class="mb-6">
            <label class="block text-sm font-medium mb-4" for="image">画像<span class="text-gray-500 ml-2 text-xs">(任意)</span></label>
            <div class="flex items-end">
              <img id="previewImage" src="/images/admin/noimage.jpg" data-noimage="/images/admin/noimage.jpg" alt="" class="rounded shadow-md w-40">
              <input id="image" class="block w-full px-4 py-3 mb-2" type="file" accept='image/*' name="image">
            </div>
          </div>
          

          <div class="mb-6">
            <label class="block text-sm font-medium mb-4" for="category">カテゴリー<span class="text-red-500 ml-2 text-xs">※ 必須</span></label>
            <div class="flex">
              <select class="appearance-none block w-2/5 pl-4 pr-8 py-3 mb-2 text-sm bg-white border rounded" name="" id="category">
                <option value="">選択してください</option>
                <option value="">フロントエンド</option>
                <option value="">バックエンド</option>
                <option value="">サーバー/インフラ</option>
                <option value="">Webデザイン</option>
                <option value="">その他</option>
              </select>
            </div>
          </div>

          <div class="mb-6">
            <label class="block text-sm font-medium mb-4">ジャンル (言語、システムなど)<span class="text-red-500 ml-2 text-xs">※ 必須</span></label>
            <select class="mr-6 w-4/5 block pl-4 pr-8 py-3 mb-2 text-sm border border border-blue-500 rounded" name="" id="js-pulldown" multiple>
              <option selected>HTML&CSS</option>
              <option>JavaScript</option>
              <option>PHP</option>
            </select>
          </div>

          <div class="mb-6">
            <label class="block text-sm font-medium mb-4" for="content">書籍のレビュー<span class="text-red-500 ml-2 text-xs">※ 必須</span></label>
            <textarea class="block w-full px-4 py-3 mb-4 text-base border rounded" name="content" id="content" cols="30" rows="10">{{old('content')}}</textarea>
          </div>

        </div>
      </form>
    </div>
  </div>
</section>


<script>
    // ジャンル追加
    $('#js-pulldown').select2();

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
</script>
@endsection