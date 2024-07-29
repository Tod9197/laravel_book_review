@extends('layouts.admin')

@section('content')
  <section class="mb-6 py-8 bg-white rounded">
    <div class="flex items-center px-6 pb-4 border-d">
      <h2 class="text-2xl font-bold">投稿一覧</h2>
        <div class="ml-auto">
      <a href="" class="py-2 px-6 text-xm text-white font-semibold bg-purple-500 rounded-md">新規投稿</a>
        </div>
    </div>
    <div class="pt-4 px-4 overflow-x-auto">
      <table class="table-auto w-full">
        <thead class="">
          <tr class="text-ts text-gray-700 text-left">
            <th class="font-medium">画像</th>
            <th class="font-medium">タイトル</th>
            <th class="font-medium text-left">カテゴリー</th>
            <th class="font-medium text-left">ジャンル</th>
            <th class="font-medium text-left">更新日時</th>
            <th class="font-medium text-left pr-10"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($posts as $post)
          <tr>
          <td class="flex py-6">
            @if($post->img_path)
            <img src="{{asset('storage/'. $post->img_path)}}" alt="{{$post->title}}の画像" class="w-20 h-20 rounded">
            @else 
            <img src="/images/admin/noimage.jpg" alt="No image" class="w-20 h-20 rounded">
            @endif
          </td>
          <td class="font-medium text-left">{{$post->title}}</td>
          <td class="font-medium text-left">カテゴリー</td>
          <td class="font-medium text-left">ジャンル</td>
          <td class="font-medium text-left">{{$post->created_at}}</td>
          <td class="font-medium text-left">{{$post->updated_at}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </section>
@endsection

