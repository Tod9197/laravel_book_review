<html lang="ja">
<head>
    <title>ログイン</title>
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
  <header class="px-4 sm:px-8 lg:px-14 py-4 flex justify-between items-center border-b border-r-indigo-300 shadow-sm">
    <h1 class="title-logo">
      <a href="/">Engineer<br>Book Club</a>
    </h1>
    <nav class="">
      <ul class="flex items-center justy-end list-none">
        <form action="{{route('admin.users.create')}}" method="get" class="mt-5">
        @csrf
        <button type="submit" class="py-2 px-4 sm:px-6 text-xs md:text-sm lg:text-base text-white font-semibold bg-green-500 hover:opacity-80 rounded-md">ユーザー登録</button>
        </form>
      </ul>
    </nav>
  </header>
  {{-- 共通ヘッダーここまで(PC) --}}

  <section class="login-bg">
    <div class="container px-4 mx-auto">
        <div class="login-box p-4 md:p-6 lg:p-8 bg-white rounded-lg shadow">
          <h1 class="mb-20 text-lg md:text-xl lg:text-2xl font-semibold text-center login-title">ログイン</h1>
          @if($errors->any())
          <div class="mb-8 py-4 px-6 border boreder-red-300 bg-red-50 rounded">
            <p class="text-red-400">ログインに失敗しました</p>
          </div>
          @endif
          <form id="loginForm" action="{{route('admin.login')}}" method="post">
          @csrf

          <div class="mb-8">
            <input class="block w-full px-2 py-2 mb-2 text-sm bg-white border border-blue-300 rounded login-input" placeholder="メールアドレス" name="email" type="text" value={{old('email')}}>
          </div>
          <div class="mb-14">
            <input class="block w-full px-2 py-2 mb-2 text-sm bg-white border border-blue-300 rounded login-input" placeholder="パスワード" name="password" type="password">
        </div>
          <button type="submit" class="block w-3/5 py-3 text-center text-xs md:text-sm lg:text-base text-white font-semibold leading-none bg-blue-500 hover:bg-blue-400 rounded login-btn">ログイン</button>
          </form>
        </div>
    </div>
  </section>

  

  <script>
     //フォームのEnterキーで送信を防止
    document.getElementById('loginForm').addEventListener('keypress',function(e){
      if(e.key === 'Enter' && e.target.type !== 'textarea'){
        e.preventDefault();
      }
    });
  </script>

   {{-- 共通フッター --}}
  <footer class="footer-login bg-gray-800 text-white py-4">
    <div class="container mx-auto text-center">
      <p class="footer-copy text-xs md:text-base">&copy; 2024 Engineer Book Club. All rights reserved.</p>
    </div>
  </footer>
  {{-- 共通フッターここまで --}}

</body>
</html>
