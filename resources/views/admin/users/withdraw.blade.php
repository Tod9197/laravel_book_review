@extends('layouts.admin')

@section('content')
  <section class="withdraw-section py-6 rounded-md"> 
      <div class="px-4 bg-white ">
        <h1 class="text-lg md:text-xl lg:text-2xl pb-2 font-semibold text-center withdraw-title">退会手続き</h1>
    <form id=withdraw-form action="{{ route('admin.users.withdraw') }}" method="POST">
      <p class="text-sm md:text-base text-left md:text-center pt-6 mb-2">退会される方は下記のボタンをクリックしてください。</p>
      <span class="text-xs md:text-sm text-left md:text-center text-red-500 withdraw-text-span"> ※ 退会されますと今まで投稿した記事の内容も全て消去されます。</span>
        @csrf
        <div class="withdraw-flex mt-8">
        <a class="back-btn py-1 px-10 rounded-md" href="{{ route('admin.posts.index') }}" class="btn btn-secondary">戻る</a>
         <button onclick="confirmWithdraw()" class="withdraw-btn py-1 px-10 rounded-md hover:opacity-80" type="button" class="btn btn-danger">退会する</button>
        </div>
    </form>
    </div>
  </section>

  {{-- <script>
    function confirmWithdraw(){
      if(confirm('本当に退会しますか？投稿した記事は全て削除されます。')){
        document.getElementById('withdraw-form').submit();
      }
    }
  </script> --}}

@endsection