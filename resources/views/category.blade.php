@extends('layouts.default')

@section('content')
<div class="category-mv">
    <h2 class=" font-semibold category-mv-title">{{$category->name}}投稿一覧</h2>
</div>
  <div class="px-4 sm:px-8 lg:px-14 mb-4 sm:mb-12 md:mb-14">
    <ul class="top-list">
      @forelse($posts as $post)
      <li class="top-list-item hover:opacity-70">
        <a href="">
        <img class="top-list-img" src="{{$post->img_path ? asset('storage/'. $post->img_path) : asset('images/admin/noimage.jpg')}}" alt="投稿画像">
        <div class="flex items-center justify-between p-2 mb-0 md:mb-2 flex-wrap">
          <p class="text-sm lg:text-base top-list-user">{{$post->user ? $post->user->name : '匿名'}}</p>
          <p class="text-xs  md:text-sm lg:text-base text-gray-400 top-list-time">{{\Carbon\Carbon::parse($post->updated_at)->format('Y/m/d')}}</p>
        </div>
        <div class="px-2 mb-4">
          @foreach($post->genres->slice(0,2) as $genre)
          <div class="top-list-genre text-xs lg:text-sm mb-1">
            {{$genre->name}} @if(!$loop->last) @endif
          </div>
          @endforeach
        </div>
        <p class="px-2 mb-8 text-xs sm:text-base">{{Str::limit($post->content,20)}}</p>
        </a>
      </li>
      @empty
    </ul>
    <p class="py-10 text-lg sm:text-xl md:text-2xl text-black-900 font-semibold text-center"> 〜  投稿はまだありません 〜</p>
    @endforelse
  </div>
  <div class="px-14">{{$posts->links()}}</div>
  <a class="block text-center text-white bg-green-500 hover:opacity-80 font-semibold backto-Top-btn" href="{{route('top.index')}}">Topページに戻る</a>
@endsection