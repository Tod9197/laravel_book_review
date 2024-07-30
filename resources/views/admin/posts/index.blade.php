@extends('layouts.admin')

@section('content')
  <section class="mb-6 mt-8 py-8 bg-white rounded-md">
    <div class="flex items-center px-6 pb-4 mb-10 border-d">
      <h2 class="text-xl font-bold">投稿一覧</h2>
        <div class="ml-auto">
      <a href="{{route('admin.posts.create')}}" class="py-2 px-6 text-xm text-white font-semibold bg-green-500 hover:opacity-80 rounded-md">新規投稿</a>
        </div>
    </div>
    <div class="pt-4 px-6 overflow-x-auto">
      <table class="table-auto w-full">
        <thead class="">
          <tr class="text-ts text-gray-700 text-left">
            <th class="font-medium pl-6">画像</th>
            <th class="font-medium text-center">タイトル</th>
            <th class="font-medium text-center">カテゴリー</th>
            <th class="font-medium text-center">ジャンル</th>
            <th class="font-medium text-center">更新日時</th>
            <th class="font-medium text-center pr-10"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($posts as $post)
          <tr class="border-b border-gray-100">
          <td class="flex py-6">
            @if($post->img_path)
            <img src="{{asset('storage/'. $post->img_path)}}" alt="{{$post->title}}の画像" class="w-20 h-20 rounded">
            @else 
            <img src="/images/admin/noimage.jpg" alt="No image" class="w-20 h-20 rounded">
            @endif
          </td>
          <td class="font-medium text-center">{{$post->title}}</td>
          <td class="font-medium text-center">{{$post->category->name}}</td>
          <td class="font-medium text-center">ジャンル</td>
          <td class="font-medium text-center">{{\Carbon\Carbon::parse($post->updated_at)->format('Y/m/d')}}</td>
          <td> 
            <div class="flex justify-end" style="margin-top: 25px">
              <a href="{{route('admin.posts.edit', ['post' => $post])}}" class="py-1 px-4 text-xm block text-white font-semibold bg-gray-700 hover:bg-blue-500 rounded-md" style="height: 33px;">編集</a>
            <form action="{{route('admin.posts.destroy',['post' => $post])}}" method="post" onsubmit="return confirmDelete()">
              @csrf
              @method('DELETE')
            <button type="submit" class="py-1 px-4 ml-6 text-xm text-white font-semibold bg-red-500 rounded-md">削除</button>
            </form>
            </div>
          </td>
          </tr>
          </a>
          @endforeach
        </tbody>
      </table>
    </div>
    {{-- ページネーション --}}
  {{$posts->onEachSide(2)->links()}}
  </section>
@endsection

