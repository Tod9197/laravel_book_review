@extends('layouts.default')

@section('content')

  <main class="top-mv" id="main">
    <div class="top-mv-box pt-6 pb-4 px-4 sm:px-8">
      <h2 class="top-mv-title">Engineer Book Club</h2>
      <h3 class="top-mv-sutitle text-sm lg:text-lg font-semibold text-center mb-4 md:mb-10"><span>WEBエンジニア・WEBデザイナー</span>を目指している方への書籍紹介</h3>
      <div class="top-mv-flex items-center">
        <div class="top-my-img-flex">
        <img class="top-my-img" src="{{asset('images/index/book01.jpg')}}" alt="プログラミング書籍">
        <img class="top-my-img" src="{{asset('images/index/book02.jpg')}}" alt="プログラミング書籍">
        <img class="top-my-img" src="{{asset('images/index/book03.jpg')}}" alt="プログラミング書籍">
        </div>
        <ul class="top-mv-list">
          <li class="top-mv-list-item">
            <img class="check-img" src="{{asset('images/index/check01.png')}}" alt="チェック">
            <p class="list-item-text">主に初学者、初心者に向けての学習書を紹介</p>
          </li>
          <li class="top-mv-list-item"><img class="check-img" src="{{asset('images/index/check01.png')}}" alt="チェック">
            <p class="list-item-text">わかりやすく丁寧、挫折しにくい</p>
            </li>
          <li class="top-mv-list-item"><img class="check-img" src="{{asset('images/index/check01.png')}}" alt="チェック">
            <p class="list-item-text">しっかり基礎から学べる</p>
          </li>
          <li class="top-mv-list-item"><img class="check-img" src="{{asset('images/index/check01.png')}}" alt="チェック">
            <p class="list-item-text">中級者にも学びのある本多数</p>
            </li>
        </ul>
        
      </div>
    </div>
</main>


<div class="top-inner px-4 sm:px-8 lg:px-14 mb-16">
    {{-- フロントエンドの投稿 --}}
  <section class="top-post-section pt-8 sm:pt-12 mb-8">
    <h2 class="text-xl md:text-2xl font-semibold mb-10 sm:mb-14 text-center title-frontend">フロントエンド</h2>
    <ul class="top-list">
    @forelse($frontendPosts as $post)
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
    @empty
    </ul>
    <p class="text-center lg:text-xl font-semibold py-8 mb-20">まだ投稿はありません</p>
    @endforelse
  </section>
  <a class="block text-center text-white bg-green-500 hover:opacity-80 font-semibold category-btn" href="{{route('category.index',1)}}">フロントエンドの書籍一覧を見る</a>
    {{-- フロントエンドの投稿ここまで --}}

    {{-- バックエンドの投稿 --}}
  <section class="top-post-section pt-12 mb-8">
    <h2 class="text-xl md:text-2xl font-semibold mb-10 sm:mb-14 top-post-title text-center title-backend">バックエンド</h2>
    <ul class="top-list">
    @forelse($backendPosts as $post)
    <li class="top-list-item  hover:opacity-70">
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
    @empty
    </ul>
    <p class="text-center lg:text-xl font-semibold py-8 mb-20">まだ投稿はありません</p>
    @endforelse
  </section>
  <a class="block text-center text-white bg-green-500 hover:opacity-80 font-semibold category-btn" href="{{route('category.index',2)}}">バックエンドの書籍一覧を見る</a>
  {{-- バックエンドの投稿ここまで --}}
  
    {{-- サーバー/インフラの投稿 --}}
  <section class="top-post-section pt-12 mb-8">
    <h2 class="text-xl md:text-2xl font-semibold mb-10 sm:mb-14 top-post-title text-center title-server">サーバー/インフラ</h2>
    <ul class="top-list">
    @forelse($infraPosts as $post)
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
    @empty
    </ul>
    <p class="text-center lg:text-xl font-semibold py-8 mb-20">まだ投稿はありません</p>
    @endforelse
  </section>
  <a class="block text-center text-white bg-green-500 hover:opacity-80 font-semibold category-btn" href="{{route('category.index',3)}}">サーバー/インフラの書籍一覧を見る</a>
  {{-- サーバー/インフラここまで --}}

    {{-- webデザインの投稿 --}}
  <section class="top-post-section pt-12 mb-8">
    <h2 class="text-xl md:text-2xl font-semibold mb-10 sm:mb-14 top-post-title text-center title-webdesign">Webデザイン</h2>
    <ul class="top-list">
    @forelse($webdesignPosts as $post)
    <li class="top-list-item  hover:opacity-70">
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
    @empty
    </ul>
    <p class="text-center lg:text-xl font-semibold py-8 mb-20">まだ投稿はありません</p>
    @endforelse
  </section>
  <a class="block text-center text-white bg-green-500 hover:opacity-80 font-semibold category-btn" href="{{route('category.index',4)}}">Webデザインの書籍一覧を見る</a>
  {{-- webデザインの投稿ここまで --}}

    {{-- web技術全般/その他の投稿 --}}
  <section class="top-post-section pt-12 mb-8">
    <h2 class="text-xl md:text-2xl font-semibold mb-10 sm:mb-14 top-post-title text-center title-webgeneral">Web技術全般/その他</h2>
    <ul class="top-list">
    @forelse($generalPosts as $post)
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
    @empty
    </ul>
    <p class="text-center lg:text-xl font-semibold py-8 mb-20">まだ投稿はありません</p>
    @endforelse
  </section>
  <a class="block text-center text-white bg-green-500 hover:opacity-80 font-semibold category-btn" href="{{route('category.index',5)}}">Web技術全般の書籍一覧を見る</a>
  {{-- web技術全般/その他の投稿ここまで --}}
</div>

@endsection


