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
  <header class="p-14 py-8 flex justify-between border-b border-r-indigo-300 shadow-sm">
    <h1 class="text-2xl  font-semibold">投稿管理画面</h1>
    <nav class="">
      <ul class="flex items-center justy-end list-none">
        <li class="text-xl mr-5">ユーザー名</li>
        <li class="text-xl mr-5"><img src="" alt="">画像</li>
      </ul>
    </nav>
  </header>
  {{-- 共通ヘッダーここまで(PC) --}}
  
  <div class="flex h-full">
  {{-- 共通サイドナビ --}}
  <div class="w-1/5 border-r border-r-indigo-300 py-14 h-5/5">
    <h2 class="text-xl text-center font-semibold mb-10">投稿管理画面</h2>
    <ul class="flex flex-col justify-start">
      <li class="text-center mb-6 hover:text-red-500"><a href="">新規投稿</a></li>
      <li class="text-center mb-6 hover:text-red-500"><a href="">プロフィール変更</a></li>
      <li class="text-center mb-6 hover:text-red-500"><a href="">ログアウト</a></li>
      <li class="text-center mb-6 hover:text-red-500"><a href="">退会</a></li>
    </ul>
  </div>
  {{-- 共通サイドナビここまで --}}


  <main class="w-4/5 p-8 bg-blue-50 h-1200">
  {{-- ページ毎の個別内容 --}}
  @yield('content')
  {{-- ページ毎の個別内容ここまで --}}
  </main>
</div>
</body>
</html>

