@extends('layouts.default')

@section('content')
<div class="show-section-inner">
<section class="show-section">
<div class="show-section-flex">
  <img class="show-img" src="{{$post->img_path ? asset('storage/'. $post->img_path) : asset('images/admin/noimage.jpg')}}" alt="投稿画像">
  <div class="show-description">
  <h2 class="show-title font-semibold mb-4">書籍名 : <span>{{$post->title}}</span></h2>
  <p class="show-category mb-2 md:mb-4 lg:mb-6">カテゴリー :
    <a href="{{route('category.index',['id' => $category->id])}}" class="inline-block bg-green-400 rounded-full px-2 md:px-4 py-1 font-semibold text-white mr-2 ml-2 hover:opacity-80 category-link">{{$category->name}}</a>
  </p>
  <p class="show-genre mb-2 md:mb-4 lg:mb-6">ジャンル :
    @foreach($post->genres as $genre)
    <span class="inline-block bg-blue-400 rounded-full px-4  text-base font-semibold text-white ml-2 mb-2"> {{$genre->name}}</span>
    @endforeach
  </p>
  <div class="flex lg:block">
  <p class="show-author mb-4 lg:mb-6 mr-8">著者 : {{$post->author}} </p>
  <p class="show-publisher mb-4 lg:mb-6">出版社 : {{$post->publisher}}</p>
  </div>
  <p class="show-url mb-4 lg:mb-6">URL : 
    <a href="{{$post->url}}" target="_blank" class="text-blue-500 underline">
    {{Str::limit($post->url,40,'...')}}</a>
    </p>
  </div>
</div>
  <p class="show-review font-semibold mb-4">ブックレビュー</p>
    <div class="show-flex flex items-center">
    <p class="show-user mr-8">投稿者 : {{$post->user ? $post->user->name : '匿名'}}</p>
    <p class="show-updated">投稿日 : {{\Carbon\Carbon::parse($post->updated_at)->format('Y/m/d') }}</p>
    </div>
  <p class="show-review-text" style="white-space: pre-wrap;">{{$post->content}}</p>
</section>


{{-- 同じカテゴリーの他の投稿 --}}
<section class="top-post-section pt-12 mb-20">
    <h3 class="text-base md:text-xl font-semibold mb-8 text-center related-title">
    〜 同じカテゴリーの他の投稿を見る 〜</h3>
    <ul class="top-list">
    @forelse($relatedPosts as $relatedPost)
    <li class="top-list-item hover:opacity-70">
      <a href="{{route('post.show', $relatedPost->id)}}">
      <img class="top-list-img" src="{{$relatedPost->img_path ? asset('storage/'. $relatedPost->img_path) : asset('images/admin/noimage.jpg')}}" alt="投稿画像">
      <h3 class="text-sm md:text-base lg:text-lg font-semibold pt-0 md:pt-2 mb-0 m-2">{{Str::limit($relatedPost->title,15)}}</h3>
      <div class="flex items-center justify-between p-2 flex-wrap">
      <p class="text-sm lg:text-base top-list-user">{{$relatedPost->user ? $relatedPost->user->name : '匿名'}}</p>
      <p class="text-xs  md:text-sm lg:text-base text-gray-400 top-list-time">{{\Carbon\Carbon::parse($relatedPost->updated_at)->format('Y/m/d') }}</p>
      </div>
      <div class="px-2 mb-4">
        @foreach($relatedPost->genres->slice(0,2) as $genre)
        <div class="top-list-genre text-xs lg:text-sm mb-1">
          {{$genre->name}} @if(!$loop->last) @endif
        </div>
        @endforeach
      </div>
      <p class="px-2 mb-8 text-xs sm:text-base">{{Str::limit($relatedPost->content,20)}}</p>
      <p class="top-list-item-btn mb-2 mr-2 p-1 bg-blue-500 text-white text-center">詳しく見る</p>
      </a>
    </li>
    @empty
    </ul>
    <p class="text-center lg:text-xl font-semibold py-8 mb-20">他に投稿はありません</p>
    @endforelse
  </section>

</div>




<a class="block text-center text-white bg-green-500 hover:opacity-80 font-semibold backto-Top-btn" href="{{route('top.index')}}">Topページに戻る</a>
@endsection