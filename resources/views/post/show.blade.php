@extends('layouts.default')

@section('content')
<section class="show-section py-8">
  <div class="show-section-inner">
  <img class="show-img" src="{{$post->img_path ? asset('storage/'. $post->img_path) : asset('images/admin/noimage.jpg')}}" alt="投稿画像">
    <h2 class="show-title font-semibold mb-4">書籍名 : {{$post->title}}</h2>
  <div class="flex items-center mb-8">
    <p class="show-user mr-8">投稿者 : {{$post->user ? $post->user->name : '匿名'}}</p>
    <p class="show-updated">投稿日 : {{\Carbon\Carbon::parse($post->updated_at)->format('Y/m/d') }}</p>
  </div>
  <p class="show-category mb-8">カテゴリー :
    <span class="inline-block bg-green-400 rounded-full px-4 py-1 text-base font-semibold text-white mr-2 ml-2">{{$category->name}}</span>
  </p>
  <p class="show-genre">ジャンル :
    @foreach($post->genres as $genre)
    <span class="inline-block bg-blue-400 rounded-full px-4 py-1 text-base font-semibold text-white ml-2"> {{$genre->name}}</span>
    @endforeach
  </p>
  </div>
</section>

@endsection