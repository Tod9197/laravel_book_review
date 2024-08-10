@extends('layouts.admin')

@section('content')
  @php
    use Illuminate\Support\Str;
  @endphp

  <section class="mb-6 mt-8 pt-8 pb-4 bg-white rounded-md">
    <div class="flex items-center px-6 pb-4 mb-4 sm:mb-8 md:mb-10 border-d">
      <h2 class="sm:text-base md:text-lg lg:text-xl font-bold">投稿一覧</h2>
        <div class="ml-auto">
      <a href="{{route('admin.posts.create')}}" class="py-2 px-4 sm:px-6 text-xs md:text-sm lg:text-base text-white font-semibold bg-green-500 hover:opacity-80 rounded-md">新規投稿</a>
        </div>
    </div>

    <div class="pt-4 px-2 md:px-6 overflow-x-auto">
      <table class="table-auto w-full">
        <thead class="">
          <tr class="text-ts text-gray-700 text-left">
            <th class="font-medium pl-6 responsive-text">画像</th>
            <th class="font-medium text-center responsive-text">タイトル</th>
            <th class="font-medium text-center responsive-text">カテゴリー</th>
            <th class="font-medium text-center hidden sm:table-cell">ジャンル</th>
            <th class="font-medium text-center hidden sm:table-cell">更新日時</th>
            <th class="font-medium text-center pr-10"></th>
          </tr>
        </thead>
        <tbody>
          @forelse($posts as $post)
          <tr class="border-b border-gray-100">
            <td class="flex py-6">
              @if($post->img_path)
              <img src="{{asset('storage/'. $post->img_path)}}" alt="{{$post->title}}の画像" class="w-14 md:w-18 lg:w-20 h-14 md:h-18 lg:h-20 rounded">
              @else 
              <img src="/images/admin/noimage.jpg" alt="No image" class="w-14 md:w-18 lg:w-20 h-14 md:h-18 lg:h-20 rounded">
              @endif
            </td>
            <td class="font-medium text-center responsive-text responsive-padding">{{ Str::limit($post->title, 15, '...') }}</td>
            <td class="font-medium text-center responsive-text responsive-padding">{{$post->category->name}}</td>
            <td class="font-medium text-center hidden sm:table-cell responsive-text"> 
              @php
                $genreCount = $post->genres->count();
              @endphp
              @if($genreCount > 3)
                @foreach($post->genres->take(3) as $genre)
                  {{$genre->name}}<br>
                  @if(!$loop->last)
                    
                  @endif
                @endforeach
                ...
              @else 
                @foreach($post->genres as $genre)
                  {{$genre->name}}<br>
                  @if(!$loop->last)
                    
                  @endif
                @endforeach
              @endif
            </td>
            <td class="font-medium text-center hidden sm:table-cell responsive-text">{{ \Carbon\Carbon::parse($post->updated_at)->format('Y/m/d') }}</td>
            <td> 
              <div class="block" style="margin-top: 25px">
                <a href="{{route('admin.posts.edit', ['post' => $post])}}" class="w-14 md:w-18 lg:w-20 py-1 lg:text-base md:text-sm block text-center text-white font-semibold bg-gray-700 hover:bg-blue-500 rounded-md responsive-text" style="margin:auto">編集</a>
                <form class="text-center mt-2" action="{{route('admin.posts.destroy',['post' => $post])}}" method="post" onsubmit="return confirmDelete()">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="w-14 md:w-18 lg:w-20 py-1 lg:text-base md:text-sm text-white font-semibold bg-red-500 hover:bg-red-400 rounded-md responsive-text">削除</button>
                </form>
              </div>
            </td>
          </tr>
          @empty
          <tr>
            <td colspan="6" class="text-no-post text-center pt-16 pb-6">まだ投稿はありません</td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>

    {{-- ページネーション --}}
    {{$posts->onEachSide(2)->links()}}
  </section>
@endsection
