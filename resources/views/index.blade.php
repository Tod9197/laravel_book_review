@extends('layouts.default')

@section('content')
  <main class="top-mv">
    <div class="top-mv-box pt-10 pb-14 px-8">
      <h2 class="top-mv-title">Engineer Book Club</h2>
      <h3 class="top-mv-sutitle text-base font-semibold text-center mb-6"><span>WEBエンジニア・WEBデザイナー</span>を目指している方への書籍紹介アプリ</h3>
      <div class="flex justify-between">
        <img class="top-my-img" src="{{asset('images/index/book01.jpg')}}" alt="プログラミング書籍">
      <p class="top-mv-text px-8">主に初学者や初心者、未経験者を対象にした書籍を紹介していきます。<br>プログラミングの学習を始めるにあたり、最初から公式ドキュメントやベテランのエンジニアが読むような本を読むと挫折の可能性が高くなります。<br>近年はとてもわかりやすくかつ力がつく本が増えてきているので、<br>まずはそういった本で基本を身につけ、少しずつ難しい本にチャレンジしていきましょう。</p>
      </div>
    </div>
  </main>

  <div class="top-inner px-4 sm:px-8 lg:px-14">
    {{-- フロントエンドの投稿 --}}
  <section class="top-post-section pt-12 mb-8">
    <h2 class="text-2xl font-semibold mb-10 text-center">フロントエンド</h2>
    <ul class="top-list">
    @forelse($frontendPosts as $post)
    <li class="top-list-item">
      <a href="">
      <img class="top-list-img" src="{{$post->img_path ? asset('storage/'. $post->img_path) : asset('images/admin/noimage.jpg')}}" alt="投稿画像">
      <h3 class="lg:text-lg font-semibold p-2 m-2">{{Str::limit($post->title,15)}}</h3>
      <div class="flex items-center justify-between p-2 mb-2">
      <p>{{$post->user ? $post->user->name : '匿名'}}</p>
      <p>{{\Carbon\Carbon::parse($post->updated_at)->format('Y/m/d') }}</p>
      </div>
      <div class="px-2 mb-4">
        @foreach($post->genres->slice(0,2) as $genre)
        <div class="top-list-genre lg:text-sm">
          {{$genre->name}} @if(!$loop->last) @endif
        </div>
        @endforeach
      </div>
      <p class="px-2 mb-4">{{Str::limit($post->content,60)}}</p>
      </a>
    </li>
    @empty
    </ul>
    <p>まだ投稿はありません</p>
    @endforelse
  </section>
  <a class="block text-center text-white bg-green-300 font-semibold category-btn" href="{{route('category.index',1)}}">フロントエンドの書籍をもっと見る</a>
    {{-- フロントエンドの投稿ここまで --}}

    {{-- バックエンドの投稿 --}}
  <section class="top-post-section pt-12">
    <h2 class="text-2xl font-semibold mb-10 top-post-title text-center">バックエンド</h2>
    <ul class="top-list">
    @forelse($backendPosts as $post)
    <li class="top-list-item">
      <a href="">
      <img class="top-list-img" src="{{$post->img_path ? asset('storage/'. $post->img_path) : asset('images/admin/noimage.jpg')}}" alt="投稿画像">
      <div class="flex items-center justify-between p-2 mb-2">
      <h3 class=" lg:text-lg font-semibold">{{Str::limit($post->title,15)}}</h3>
      <p>{{\Carbon\Carbon::parse($post->updated_at)->format('Y/m/d') }}</p>
      </div>
      <div class="px-2 mb-4">
        @foreach($post->genres->slice(0,2) as $genre)
        <div class="top-list-genre lg:text-sm">
          {{$genre->name}} @if(!$loop->last) @endif
        </div>
        @endforeach
      </div>
      <p class="px-2 mb-4">{{Str::limit($post->content,60)}}</p>
      </a>
    </li>
    @empty
    </ul>
    <p>まだ投稿はありません</p>
    @endforelse
  </section>
  {{$backendPosts->links()}}
  {{-- バックエンドの投稿ここまで --}}
  
    {{-- サーバー/インフラの投稿 --}}
  <section class="top-post-section pt-12">
    <h2 class="text-2xl font-semibold mb-10 top-post-title text-center">サーバー/インフラ</h2>
    <ul class="top-list">
    @forelse($infraPosts as $post)
    <li class="top-list-item">
      <a href="">
      <img class="top-list-img" src="{{$post->img_path ? asset('storage/'. $post->img_path) : asset('images/admin/noimage.jpg')}}" alt="投稿画像">
      <div class="flex items-center justify-between p-2 mb-2">
      <h3 class=" lg:text-lg font-semibold">{{Str::limit($post->title,15)}}</h3>
      <p>{{\Carbon\Carbon::parse($post->updated_at)->format('Y/m/d') }}</p>
      </div>
      <div class="px-2 mb-4">
        @foreach($post->genres->slice(0,2) as $genre)
        <div class="top-list-genre lg:text-sm">
          {{$genre->name}} @if(!$loop->last) @endif
        </div>
        @endforeach
      </div>
      <p class="px-2 mb-4">{{Str::limit($post->content,60)}}</p>
      </a>
    </li>
    @empty
    </ul>
    <p>まだ投稿はありません</p>
    @endforelse
  </section>
  {{$infraPosts->links()}}
  {{-- サーバー/インフラここまで --}}

    {{-- webデザインの投稿 --}}
  <section class="top-post-section pt-12">
    <h2 class="text-2xl font-semibold mb-10 top-post-title text-center">Webデザイン</h2>
    <ul class="top-list">
    @forelse($webdesignPosts as $post)
    <li class="top-list-item">
      <a href="">
      <img class="top-list-img" src="{{$post->img_path ? asset('storage/'. $post->img_path) : asset('images/admin/noimage.jpg')}}" alt="投稿画像">
      <div class="flex items-center justify-between p-2 mb-2">
      <h3 class=" lg:text-lg font-semibold">{{Str::limit($post->title,15)}}</h3>
      <p>{{\Carbon\Carbon::parse($post->updated_at)->format('Y/m/d') }}</p>
      </div>
      <div class="px-2 mb-4">
        @foreach($post->genres->slice(0,2) as $genre)
        <div class="top-list-genre lg:text-sm">
          {{$genre->name}} @if(!$loop->last) @endif
        </div>
        @endforeach
      </div>
      <p class="px-2 mb-4">{{Str::limit($post->content,60)}}</p>
      </a>
    </li>
    @empty
    </ul>
    <p class="text-center lg:text-xl font-semibold py-8 mb-20">まだ投稿はありません</p>
    @endforelse
  </section>
  {{$webdesignPosts->links()}}
  {{-- webデザインの投稿ここまで --}}

    {{-- web技術全般/その他の投稿 --}}
  <section class="top-post-section pt-12">
    <h2 class="text-2xl font-semibold mb-10 top-post-title text-center">web技術全般/その他</h2>
    <ul class="top-list">
    @forelse($generalPosts as $post)
    <li class="top-list-item">
      <a href="">
      <img class="top-list-img" src="{{$post->img_path ? asset('storage/'. $post->img_path) : asset('images/admin/noimage.jpg')}}" alt="投稿画像">
      <div class="flex items-center justify-between p-2 mb-2">
      <h3 class=" lg:text-lg font-semibold">{{Str::limit($post->title,15)}}</h3>
      <p>{{\Carbon\Carbon::parse($post->updated_at)->format('Y/m/d') }}</p>
      </div>
      <div class="px-2 mb-4">
        @foreach($post->genres->slice(0,2) as $genre)
        <div class="top-list-genre lg:text-sm">
          {{$genre->name}} @if(!$loop->last) @endif
        </div>
        @endforeach
      </div>
      <p class="px-2 mb-4">{{Str::limit($post->content,60)}}</p>
      </a>
    </li>
    @empty
    </ul>
    <p class="text-center lg:text-xl font-semibold py-8 mb-20">まだ投稿はありません</p>
    @endforelse
  </section>
  {{$generalPosts->links()}}
  {{-- web技術全般/その他の投稿ここまで --}}

</div>
@endsection