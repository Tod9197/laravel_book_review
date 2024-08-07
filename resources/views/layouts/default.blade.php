<html lang="ja">
<head>
    <title>投稿管理画面</title>
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
  <header class="px-4 sm:px-8 lg:px-14 py-2 md:py-4 flex justify-between items-center border-b border-r-indigo-300 shadow-sm">
    <h1 class="title-logo">
      <a href="/">Engineer<br>Book Club</a>
    </h1>
    <nav class="">
      <ul class="flex items-center justy-end list-none">
        @auth
        <li class="mr-5 text-xs md:text-sm lg:text-base">{{\Auth::user()->name}}</li>
        <li class="mr-5 text-xs md:text-sm lg:text-base"><img class="user-img" src="{{asset('storage/'. \Auth::user()->img_path)}}" alt="ユーザー画像"></li>
        <li class="mr-5 text-xs md:text-sm lg:text-base">
          <a href="{{route('admin.posts.index')}}" class="hover:opacity-80">
          <img class="mypage-img" src="/images/index/mypage.png" alt="ユーザー画像">
          <p class="text-xs hover:opacity-80">My Page</p>
          </a>
        </li>
        @endauth
        @guest
        <form class="m-0 md:mt-5" action="{{route('admin.users.create')}}" method="get">
          @csrf
          <button type="submit" class="py-2 px-2 md:px-4 mr-4 sm:px-6 text-xs md:text-sm lg:text-base text-white font-semibold bg-green-500 hover:bg-green-400 rounded-md">ユーザー登録</button>
        </form>
        <form class="m-0 md:mt-5" action="{{route('admin.login')}}" method="get">
          @csrf
          <button type="submit" class="py-2 px-2 md:px-4 sm:px-6 text-xs md:text-sm lg:text-base text-white font-semibold bg-blue-500 hover:bg-blue-400 rounded-md">ログイン</button>
        </form>
        @endguest
      </ul>
    </nav>
  </header>
  {{-- 共通ヘッダーここまで(PC) --}}

  {{-- ページ毎の個別内容 --}}
  <div class="content">
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