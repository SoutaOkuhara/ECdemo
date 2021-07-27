@extends("layouts.detailapp")
@section("title",'Home')
@section('menubar')
    @parent
    ホーム
@endsection

@section('content')
@if(Auth::check())
<p class="user">USER:{{$user->name.'('.$user->email.')'}}<a href="/mypage"><button class="button">マイページへ</button></a></p>
@else
<p>※ログインしていません。(<a href="/login">ログイン</a> | <a href="/register">登録</a>)</p>
@endif
<h2>Welcome to EC Site!!</h2>
<div class="indent">
    <p>様々な商品を見つけよう！！</p>
    <a href="/product/shop"><button class="button">shopページへ</button></a>
</div>  
<div class="indent"> 
    <p>お問い合わせやよくあるご質問</p>
    <a href="/contact/list"><button class="button">contactページへ</button></a>
</div>  
<div class="indent">
    <p>ログインして便利な機能を使おう！！</p>
    <a href="/user/auth"><button class="button">ログイン・新規作成する</button></a>
</div>  
@endsection