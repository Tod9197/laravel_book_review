@extends('layouts.default')

@section('content')
<div class="category-mv">
    <h2 class=" font-semibold category-mv-title">{{$category->name}}投稿一覧</h2>
</div>
  <div class="px-4 sm:px-8 lg:px-14 mb-4 sm:mb-12 md:mb-14">
    <ul class="top-list">
      @forelse($posts as $post)
      <li class="top-list-item-category hover:opacity-70">
        <a href="{{route('post.show',$post->id)}}">
        <img class="top-list-img" src="{{$post->img_path ? asset('storage/'. $post->img_path) : asset('images/admin/noimage.jpg')}}" alt="投稿画像">
        <h3 class="top-list-title font-semibold pt-0 md:pt-2 mb-0 m-2">{{Str::limit($post->title,15)}}</h3>
        <div class="flex items-center justify-between p-2 mb-0 md:mb-2 flex-wrap">
          <p class="text-sm lg:text-base top-list-user">{{$post->user ? $post->user->name : '匿名'}}</p>
          <p class="text-xs md:text-sm lg:text-base text-gray-400 top-list-time">{{\Carbon\Carbon::parse($post->updated_at)->format('Y/m/d')}}</p>
        </div>
        <div class="px-2 mb-2 sm:mb-4 top-list-genre-flex">
          @foreach($post->genres->slice(0,2) as $genre)
          <div class="top-list-genre text-xs lg:text-sm mb-1">
            {{$genre->name}} @if(!$loop->last) @endif
          </div>
          @endforeach
        </div>
        <p class="px-2 mb-8 text-xs md:text-base top-list-content">{{Str::limit($post->content,20)}}</p>
        <p class="top-list-item-btn mb-2 mr-2 p-1 bg-blue-500 text-white text-center">詳しく見る</p>
        </a>
      </li>
      @empty
    </ul>
    <p class="py-10 text-lg sm:text-xl md:text-2xl text-black-900 font-semibold text-center"> 〜  まだ投稿はありません 〜</p>
    @endforelse
  </div>
  <div class="px-14">{{$posts->links()}}</div>
  <a class="block text-center text-white bg-green-500 hover:opacity-80 font-semibold backto-Top-btn" href="{{route('top.index')}}">Topページに戻る</a>
@endsection