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
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon.png">
    <script src="/js/main.js"></script>
    <script src="/js/admin/jquery-3.6.0.slim.min.js"></script>
    <script src="/js/admin/select2.min.js"></script>
</head>
<body class="antialiased text-body font-body">

  {{-- 共通ヘッダー(PC) --}}
  <header class="px-4 sm:px-8 lg:px-14 py-4 flex justify-between items-center border-b border-r-indigo-300 shadow-sm">
    <h1 class="title-logo">
      <a href="/">Engineer<br>Book Club</a>
    </h1>
    <nav class="">
      <ul class="flex items-center justy-end list-none">
        @auth
        <li class="mr-5 text-xs md:text-sm lg:text-base">{{\Auth::user()->name}}</li>
        <li class="mr-5 text-xs md:text-sm lg:text-base"><img class="user-img" src="{{asset('storage/'. \Auth::user()->img_path)}}" alt="ユーザー画像"></li>
        @endauth
        @guest
        <form class="mt-5" action="{{route('admin.login')}}" method="get">
          @csrf
          <button type="submit" class="py-2 px-4 sm:px-6 text-xs md:text-sm lg:text-base text-white font-semibold bg-blue-500 hover:bg-blue-400 rounded-md">ログイン</button>
        </form>
        @endguest
      </ul>
    </nav>
  </header>
  {{-- 共通ヘッダーここまで(PC) --}}
  
  <div class="flex h-auto">
  {{-- 共通サイドナビ --}}
  {{-- ログイン時 --}}
  @auth
  <div class="hidden lg:block w-1/5 border-r border-r-indigo-300 py-14 h-5/5">
    <h2 class="text-xl text-center font-semibold mb-10">投稿管理画面</h2>
    <ul class="flex flex-col justify-start">
      <li class="text-center hover:text-red-500 nav-item"><a class="" href="{{route('admin.posts.create')}}">新規投稿</a></li>
      <li class="text-center hover:text-red-500 nav-item"><a href="">プロフィール変更</a></li>
      <li class="text-center hover:text-red-500 nav-item"><a href="">パスワード変更</a></li>
      <li class="text-center hover:text-red-500 nav-item"><a href="">退会</a></li>
      <form action="{{route('admin.logout')}}" method="post">
        @csrf
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
    <h2 class="sm:text-base md:text-lg lg:text-xl text-left font-semibold mb-4 sm:mb-10">投稿管理画面</h2>
    <ul class="under-nav-flex">
      <li class="text-center mr-2 md:mr-4 text-base hover:text-red-500 under-nav-itam"><a href="{{route('admin.posts.create')}}">新規投稿</a></li>
      <li class="text-center mr-2 md:mr-4 text-base hover:text-red-500 under-nav-itam"><a href="">プロフィール変更</a></li>
      <li class="text-center mr-2 md:mr-4 text-base hover:text-red-500 under-nav-itam"><a href="">パスワード変更</a></li>
      <li class="text-center mr-2 md:mr-4 text-base hover:text-red-500 under-nav-itam"><a href="">退会</a></li>
      <form action="{{route('admin.logout')}}" method="post">
        @csrf
      <button type="submit" class="text-left hover:text-red-500 nav-item">ログアウト</button>
      </form>
    </ul>
    </div>
  </section>
  @endauth
  {{-- ログイン時ここま で --}}
</body>
</html>

