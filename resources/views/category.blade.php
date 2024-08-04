@extends('layouts.default')

@section('content')
<section class="category-post-section pt-12">
    <h2 class="text-2xl font-semibold mb-10 text-center">{{$category->name}}の投稿</h2>
    <ul class="post-list">
    @forelse($posts as $post)
    <li class="post-list-item">
      <a href="">
      <img class="post-list-img" src="{{$post->img_path ? asset('storage/'. $post->img_path) : asset('images/admin/noimage.jpg')}}" alt="投稿画像">
      <h3 class="lg:text-lg font-semibold p-2 m-2">{{Str::limit($post->title,15)}}</h3>
      <div class="flex items-center justify-between p-2 mb-2">
      <p>{{$post->user ? $post->user->name : '匿名'}}</p>
      <p>{{\Carbon\Carbon::parse($post->updated_at)->format('Y/m/d') }}</p>
      </div>
      <div class="px-2 mb-4">
        @foreach($post->genres->slice(0,2) as $genre)
        <div class="post-list-genre lg:text-sm">
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
@endsection