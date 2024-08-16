@extends('layouts.admin')

@section('content')
<section class="py-6">
  <div class="container mx-auto">
    <div class="py-6 bg-white rounded-md">
      <form action="{{route('admin.posts.update',['post' => $post->id])}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="flex px-6 pb-4 border-b items-center justify-between">
          <h3 class="sm:text-base md:text-lg lg:text-xl font-bold">レビュー内容編集</h3>
          <div><button type="submit" class="py-2 px-6 sm:px-6 text-xs md:text-sm lg:text-base text-white font-semibold bg-blue-400 rounded-md">更新する</button>
          </div>
        </div>

        <div class="pt-10 px-4 sm:px-6">
          {{-- エラーメッセージ --}}
          @if($errors->any())
          <div class="mb-8 pt-4 pb-2 px-6 border border-red-300 bg-red-50 rounded">
            <ul>
        {{-- カスタム順序で表示 --}}
        @foreach(['title', 'category_id', 'genres','content'] as $key)
            @if($errors->has($key))
                @foreach($errors->get($key) as $error)
                    <li class="text-red-400 text-xs sm:text-sm lg:text-base mb-2">{{ $error }}</li>
                @endforeach
            @endif
        @endforeach
      </ul>
    </div>
    @endif
          {{-- エラーメッセージここまで --}}
          <div class="mb-6">
            <label class="block text-xs sm:text-sm font-medium mb-4" for="title">書籍タイトル<span class="text-red-500 ml-2 text-xs">※ 必須</span></label>
            <input id="title" class="block w-full lg:w-4/5 px-4 py-3 mb-2 text-xs sm:text-sm bg-white border rounded" name="title" type="text" value={{old('title',$post->title)}}>
          </div>

          <div class="mb-6">
            <label class="block text-xs sm:text-sm font-medium mb-4" for="title">著者<span class="text-gray-500 ml-2 text-xs">(任意)</span></label>
            <input id="author" class="block w-full lg:w-4/5 px-4 py-3 mb-2 text-sm bg-white border rounded" name="author" type="text" value={{old('author',$post->author)}}>
          </div>

          <div class="mb-6">
            <label class="block text-xs sm:text-sm font-medium mb-4" for="title">出版社<span class="text-gray-500 ml-2 text-xs">(任意)</span></label>
            <input id="publisher" class="block w-full lg:w-4/5 px-4 py-3 mb-2 text-sm bg-white border rounded" name="publisher" type="text" value={{old('publisher',$post->publisher)}}>
          </div>

          <div class="mb-6">
            <label class="block text-xs sm:text-sm font-medium mb-4" for="title">書籍URL<span class="text-gray-500 ml-2 text-xs">(任意:AmazonなどのURL)</span></label>
            <input id="url" class="block w-full lg:w-4/5 px-4 py-3 mb-2 text-sm bg-white border rounded" name="url" type="text" value={{old('url',$post->url)}}>
          </div>

          <div class="mb-0 md:mb-6">
            <label class="block text-xs sm:text-sm font-medium mb-4" for="image">画像<span class="text-gray-500 ml-2 text-xs">(任意)</span></label>
            <div class="img-flex items-end">
              <img id="previewImage" src="{{ $post->img_path ? asset('storage/' . $post->img_path) : asset('images/admin/noimage.jpg') }}" data-noimage="{{ asset('images/admin/noimage.jpg') }}" alt="アップロード画像" class="rounded shadow-md w-40 uploadImg">
              <input id="image" class="block w-full px-4 py-3 mb-2 text-xs sm:text-sm" type="file" accept='image/*' name="image">
            </div>
          </div>

          <div class="mb-6">
            <div class="flex items-center">
              <input type="checkbox" name="deleteImage" id="deleteImage" value="1" class="mr-2">
              <label for="deleteImage" class="text-xs sm:text-sm">画像を削除</label>
            </div>
          </div>

          <div class="mb-6">
            <label class="block text-xs sm:text-sm font-medium mb-4" for="category">カテゴリー<span class="text-red-500 ml-2 text-xs">※ 必須</span></label>
            <div class="flex">
              <select class="appearance-none block  w-full sm:w-2/5 pl-4 pr-8 py-3 mb-2 text-sm bg-white border rounded" name="category_id" id="category">
                <option value="">選択してください</option>
                @foreach($categories as $category)
                <option value="{{$category->id}}" @if($category->id == old('category_id',$post->category->id)) selected @endif>{{$category->name}}</option>
                @endforeach  
              </select>
            </div>
          </div>

          <div class="mb-6">
            <label class="block text-xs sm:text-sm font-medium mb-4">ジャンル (言語、システムなど)<span class="text-red-500 ml-2 text-xs">※ 必須</span></label>
            <select class="mr-6 w-4/5 block pl-4 pr-8 py-3 mb-2 text-sm border border-blue-500 rounded" name="genres[]" id="js-pulldown" multiple>
              <option value="">選択してください</option>
              @foreach($genres as $genre)
              <option value="{{$genre->id}}" @if(in_array($genre->id,old('genres',$post->genres->pluck('id')->all()))) selected @endif>{{$genre->name}}</option>
              @endforeach
            </select>
          </div>

          <div class="mb-6">
            <label class="block text-xs sm:text-sm font-medium mb-4" for="content">書籍のレビュー<span class="text-red-500 ml-2 text-xs">※ 必須</span></label>
            <textarea class="block w-full px-4 py-3 mb-4 text-base border rounded" name="content" id="content" cols="30" rows="10">{{old('content',$post->content)}}</textarea>
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