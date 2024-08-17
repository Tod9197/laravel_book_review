<html lang="ja">
<head>
    <title>Engineer Book Club</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,500;0,700;1,400&display=swap">
    <link rel="stylesheet" href="/css/admin/tailwind/tailwind.min.css">
    <link rel="stylesheet" href="/css/admin/select2.min.css">
    <link rel="stylesheet" href="/css/admin/custom.css">
    <link rel="stylesheet" href="/css/admin/custom.css">
    <link rel="stylesheet" href="/css/index/main.css">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon.png">
    <script src="/js/main.js"></script>
    <script src="/js/admin/jquery-3.6.0.slim.min.js"></script>
    <script src="/js/admin/select2.min.js"></script>
</head>
<body class="antialiased text-body font-body">

<div class="wrapper">
  {{-- 共通ヘッダー(PC) --}}
  <header class="header px-4 sm:px-8 lg:px-14 py-2 lg:py-4 flex justify-between items-center shadow-sm">
    <h1 class="title-logo">
      <a href="/">Engineer<br>Book Club</a>
    </h1>

    {{-- 検索フォーム --}}
<form class="search-bar" action="{{route('search')}}" method="GET">
  <div class="search-bar-flex">
  <input class="search-input" id="searchInput" type="text" name="query" placeholder="タイトル、著者名、出版社名などで検索" value="{{request('query')}}">
  <button class="search-bar-button" type="submit" id="searchButton" disabled><img class="search-bar-img -responsive" src="/images/index/searchbar-01.png" alt="投稿一覧アイコン"></button>
  </div>
</form>
  
    <nav class="">
      <ul class="flex items-center list-none">
        {{-- ログイン時 --}}
        @auth
        <li class="mr-4 sm:mr-6 mt-4 text-xs md:text-sm lg:text-base"><img class="user-img" src="{{ \Auth::user()->img_path ? asset('storage/' . \Auth::user()->img_path) : asset('images/admin/noimage.jpg') }}" alt="ユーザー画像"><span class="mt-1 text-xs md:text-sm lg:text-base">{{\Auth::user()->name}}</span></li>
        <li class="text-xs md:text-sm lg:text-base">
          <a href="{{route('admin.posts.index')}}" class="hover:opacity-80">
          <img class="mypage-img" src="/images/index/mypage.png" alt="ユーザー画像">
          <p class="text-xs lg:text-base hover:opacity-80">My Page</p>
          </a>
        </li>
      </ul>
        @endauth
        {{-- ログイン時ここまで --}}
        {{-- 未ログイン時 --}}
        @guest
        <div class="top-button-flex">
        <form action="{{route('admin.users.create')}}" method="get">
          @csrf
          <button type="submit" class="py-2 px-2 md:px-4 mr-4 sm:px-6 md:text-sm lg:text-base text-white font-semibold bg-green-500 hover:bg-green-400 rounded-md sign-up-button">ユーザー登録</button>
        </form>
        <form action="{{route('admin.login')}}" method="get">
          @csrf
          <button type="submit" class="py-2 px-2 md:px-4 sm:px-6 md:text-sm lg:text-base text-white font-semibold bg-blue-500 hover:bg-blue-400 rounded-md login-button">ログイン</button>
        </form>
        </div>
        @endguest
        {{-- 未ログイン時ここまで --}}
    </nav>
  </header>
          {{-- 767px以下検索フォーム --}}
<form class="search-bar-responsive" action="{{route('search')}}" method="GET">
  <div class="search-bar-flex">
  <input class="search-input" type="text" name="query" placeholder="タイトル、著者名、出版社名などで検索" value="{{request('query')}}">
  <button class="search-bar-button" type="submit"><img class="search-bar-img -responsive" src="/images/index/searchbar-01.png" alt="投稿一覧アイコン"></button>
  </div>
</form>
  {{-- 共通ヘッダーここまで(PC) --}}


  {{-- ページ毎の個別内容 --}}
  <div class="content">

    {{-- 退会時のメッセージ --}}
    @if(session('success'))
        <script>
            alert("{{ session('success') }}");
        </script>
    @endif

  @yield('content')
  </div>
  {{-- ページ毎の個別内容ここまで --}}

  {{-- 共通フッター --}}
  <footer class="footer bg-gray-800 text-white py-4 mt-8">
    <div class="container mx-auto text-center">
      <p class="footer-copy text-xs md:text-base">&copy; 2024 Engineer Book Club. All rights reserved.</p>
    </div>
  </footer>
  {{-- 共通フッターここまで --}}
</div>