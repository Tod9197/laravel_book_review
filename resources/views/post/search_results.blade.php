@extends('layouts.default')

@section('content')


<div class="top-inner px-4 sm:px-8 lg:px-14 mb-16">

<section class="top-post-section pt-8 sm:pt-12 mb-8">
  {{-- 検索結果の表示 --}}
<h2 class="text-xl md:text-2xl font-semibold mb-4 text-center">〜「{{ request('query') }}」 〜 の検索結果</h2>
<p class="text-center text-sm md:text-base font-semibold mb-10">{{$resultCount}}件ヒットしました</p>
@if($posts->isEmpty())
    <p class="text-center text-base md:text-xl font-semibold mb-10">該当の投稿が見つかりませんでした</p>
@else
    <ul class="top-list">
        @foreach($posts as $post)
            <li class="top-list-item hover:opacity-70">
      <a href="{{route('post.show',$post->id)}}">
      <img class="top-list-img" src="{{$post->img_path ? asset('storage/'. $post->img_path) : asset('images/admin/noimage.jpg')}}" alt="投稿画像">
      <h3 class="top-list-title font-semibold pt-0 md:pt-2 mb-0 m-2">{{Str::limit($post->title,20)}}</h3>
      <div class="flex items-center justify-between p-2 flex-wrap">
      <p class="text-sm lg:text-base top-list-user">{{$post->user ? $post->user->name : '匿名'}}</p>
      <p class="text-xs  md:text-sm lg:text-base text-gray-400 top-list-time">{{\Carbon\Carbon::parse($post->updated_at)->format('Y/m/d') }}</p>
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
        @endforeach
    </ul>
@endif
</div>
</section>
<a class="block text-center text-white bg-green-500 hover:opacity-80 font-semibold backto-Top-btn" href="{{route('top.index')}}">Topページに戻る</a>
@endsection
