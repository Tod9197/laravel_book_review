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
    <link rel="stylesheet" href="/css/index/main.css">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon.png">
    <script src="/js/main.js"></script>
    <script src="/js/admin/jquery-3.6.0.slim.min.js"></script>
    <script src="/js/admin/select2.min.js"></script>
</head>
<body class="antialiased text-body font-body">

  {{-- 共通ヘッダー(PC) --}}
  <header class="px-4 sm:px-8 lg:px-14 pt-4 pb-2 flex justify-between items-center border-b border-r-indigo-300 shadow-sm">
    <h1 class="title-logo">
      <a href="/">Engineer<br>Book Club</a>
    </h1>
    <nav class="">
      <ul class="flex items-center justy-end list-none">
        {{-- ログイン時 --}}
        @auth
        <li class="mr-14 mt-1 text-xs md:text-sm lg:text-base"><img class="user-img" src="{{ \Auth::user()->img_path ? asset('storage/' . \Auth::user()->img_path) : asset('images/admin/noimage.jpg') }}" alt="ユーザー画像"><span class="mt-1 text-xs md:text-sm lg:text-base">{{\Auth::user()->name}}</span></li>
        
        <div class="hamburger-button" onclick="toggleMenu()">
          <img class="hamburger-button-img" src="/images/admin/menu01.png" alt="メニューアイコン">
          <span class="mt-1 text-xs md:text-sm lg:text-base hamburger-button-text">Menu</span>
        </div>
        @endauth
        {{-- ログイン時ここまで --}}
        {{-- 未ログイン時 --}}
        @guest
        <form class="mt-5" action="{{route('admin.login')}}" method="get">
          @csrf
          <button type="submit" class="py-2 px-4 sm:px-6 text-xs md:text-sm lg:text-base text-white font-semibold bg-blue-500 hover:bg-blue-400 rounded-md">ログイン</button>
        </form>
        @endguest
        {{-- 未ログイン時ここまで --}}
      </ul>
    </nav>
  </header>
  {{-- 共通ヘッダーここまで(PC) --}}
  
  <div class="flex h-auto">
  {{-- 共通サイドナビ --}}
  {{-- ログイン時 --}}
  @auth
  <div class="hidden lg:block w-1/5 border-r border-r-indigo-300 py-14 h-5/5">
    <h2 class="text-2xl text-center font-semibold mb-10 mypage-title">My Page</h2>
    <ul class="flex flex-col justify-start">
      <li class="text-center hover:text-red-500 nav-item">
        <a class="hover:opacity-80" href="{{route('admin.posts.create')}}">
          <img class="mypage-contents-img" src="/images/admin/postadd01.png" alt="新規投稿アイコン">
          <p>新規投稿</p>
        </a>
      </li>
      <li class="text-center hover:text-red-500 nav-item">
        <a class="hover:opacity-80" href="{{route('admin.posts.index')}}">
          <img class="mypage-contents-img" src="/images/admin/postindex.png" alt="投稿一覧アイコン">
          <p>投稿一覧</p>
        </a>
      </li>
      <li class="text-center hover:text-red-500 nav-item">
        <a class="hover:opacity-80" href="{{route('admin.users.edit',['user' => Auth::id()])}}">
          <img class="mypage-contents-img" src="/images/admin/person02.png" alt="プロフィール変更アイコン">
          <p>プロフィール変更</p>
        </a></li>
      <li class="text-center hover:text-red-500 nav-item">
        <a href="{{route('admin.users.withdraw')}}">
          <img class="mypage-contents-img" src="/images/admin/person03.png" alt="退会アイコン">
          <p>退会</p>
        </a>
      </li>
      <form action="{{route('admin.logout')}}" method="post">
        @csrf
      <img class="mypage-contents-img -logout" src="/images/admin/logout01.png" alt="ログアウトアイコン">
      <button type="submit" class="text-center hover:text-red-500 nav-item">ログアウト</button>
      </form>
    </ul>
  </div>
  {{-- 共通サイドナビここまで --}}

  <main class="w-full lg:w-4/5 p-4 sm:p-8 main-height">
    {{-- 登録完了メッセージ(全ページ共通) --}}
    @if(session()->has('success'))
        <div id="success-message" class="mb-4 text-right ">
                    <div
                        class="pl-16 pr-20 py-4 bg-white  shadow-md rounded-lg inline-block ml-auto">
                        <div class="flex items-center">
                        <span class="inline-block mr-2">
                          <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                              xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10 0C4.5 0 0 4.5 0 10C0 15.5 4.5 20 10 20C15.5 20 20 15.5 20 10C20 4.5 15.5 0 10 0ZM14.2 8.3L9.4 13.1C9 13.5 8.4 13.5 8 13.1L5.8 10.9C5.4 10.5 5.4 9.9 5.8 9.5C6.2 9.1 6.8 9.1 7.2 9.5L8.7 11L12.8 6.9C13.2 6.5 13.8 6.5 14.2 6.9C14.6 7.3 14.6 7.9 14.2 8.3Z"
                                fill="#0000FF"></path>
                          </svg>
                        </span>
                            <p class="text-blue-500 font-medium">{{ session('success') }}</p>
                        </div>
                    </div>
                </div>
    @endif
    {{-- 登録完了メッセージ(全ページ共通) ここまで --}}
  {{-- ページ毎の個別内容 --}}
  @yield('content')
  {{-- ページ毎の個別内容ここまで --}}
  </main>
  @endauth
{{-- ログイン時ここまで --}}
  
  {{-- 未ログイン、未登録時 --}}
  @guest
  <main class="w-full p-4 sm:p-8 main-height">
    {{-- 登録完了メッセージ(全ページ共通) --}}
    @if(session()->has('success'))
        <div id="success-message" class="mb-4 text-right ">
                    <div
                        class="pl-16 pr-20 py-4 bg-white  shadow-md rounded-lg inline-block ml-auto">
                        <div class="flex items-center">
                        <span class="inline-block mr-2">
                          <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                              xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10 0C4.5 0 0 4.5 0 10C0 15.5 4.5 20 10 20C15.5 20 20 15.5 20 10C20 4.5 15.5 0 10 0ZM14.2 8.3L9.4 13.1C9 13.5 8.4 13.5 8 13.1L5.8 10.9C5.4 10.5 5.4 9.9 5.8 9.5C6.2 9.1 6.8 9.1 7.2 9.5L8.7 11L12.8 6.9C13.2 6.5 13.8 6.5 14.2 6.9C14.6 7.3 14.6 7.9 14.2 8.3Z"
                                fill="#0000FF"></path>
                          </svg>
                        </span>
                            <p class="text-blue-500 font-medium">{{ session('success') }}</p>
                        </div>
                    </div>
                </div>
    @endif
    {{-- 登録完了メッセージ(全ページ共通) ここまで --}}
  {{-- ページ毎の個別内容 --}}
  @yield('content')
  {{-- ページ毎の個別内容ここまで --}}
  </main>
  @endguest
  {{-- 未ログイン、未登録時ここまで --}}
</div>


  {{-- 1024px以下のナビゲーション --}}
  {{-- ログイン時 --}}
  @auth
  <section class="under-nav border-t border-r-indigo-300 shadow-sm">
    <div class="p-4 sm:p-8">
    <h2 class="text-2xl  sm:text-3xl text-center font-semibold mb-12 mt-4 mypage-title">My Page</h2>
    <ul class="under-nav-flex">
      <li class="text-base sm:text-xl text-center mb-8 hover:text-red-500 under-nav-itam"><a href="{{route('admin.posts.create')}}">
        <img class="mypage-contents-img -responsive" src="/images/admin/postadd01.png" alt="新規投稿アイコン">
        新規投稿
      </a>
    </li>
      <li class="text-base sm:text-xl text-center mb-8 hover:text-red-500 under-nav-itam"><a href="{{route('admin.posts.index')}}">
        <img class="mypage-contents-img -responsive" src="/images/admin/postindex.png" alt="投稿一覧アイコン">
        投稿一覧
      </a>
    </li>
      <li class="text-base sm:text-xl text-center mb-8 hover:text-red-500 under-nav-itam">
        <a href="{{route('admin.users.edit',['user' => Auth::id()])}}">
      <img class="mypage-contents-img -responsive" src="/images/admin/person02.png" alt="プロフィール変更アイコン">
        プロフィール変更</a>
      </li>
      <li class="text-base sm:text-xl text-center mb-8 hover:text-red-500 under-nav-itam"><a href="{{route('admin.users.withdraw')}}">
        <img class="mypage-contents-img -responsive" src="/images/admin/person03.png" alt="退会アイコン">
        退会
      </a>
    </li>
      <form action="{{route('admin.logout')}}" method="post">
        @csrf
      <div class="flex items-center">
      <button type="submit" class="text-base sm:text-xl text-center hover:text-red-500 logout-btn">ログアウト</button>
      </div>
      </form>
    </ul>
    </div>
  </section>
  @endauth
  {{-- ログイン時ここま で --}}

    {{-- 共通フッター --}}
  <footer class="footer-admin bg-gray-800 text-white py-4">
    <div class="container mx-auto text-center">
      <p class="footer-copy text-xs md:text-base">&copy; 2024 Engineer Book Club. All rights reserved.</p>
    </div>
  </footer>
  {{-- 共通フッターここまで --}}

</body>
</html>

