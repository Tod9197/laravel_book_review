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
  <section class="top-post-section py-8">
    <h2 class="text-2xl font-semibold mb-8">フロントエンド</h2>
    <ul class="top-list">
     @forelse($posts as $post)
     <li class="top-list-item">
      <a href="">
      <img class="top-list-img" src="{{asset('storage/'. $post->img_path)}}" alt="投稿画像">
      <h3 class=" lg:text-base font-semibold p-2">{{$post->title}}</h3>
      <p>カテゴリー：{{$post->category->name}}</p>
      <p>
        @foreach($post->genres->slice(0,2) as $genre)
          {{$genre->name}} @if(!$loop->last),@endif
        @endforeach
      </p>
      </a>
     </li>
     @empty
     </ul>
     <p>まだ投稿はありません</p>
     @endforelse

  </section>
   {{$posts->links()}}
  </div>
@endsection