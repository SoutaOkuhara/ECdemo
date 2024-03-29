@extends("layouts.detailapp")
@section("title",'Thanks for Buy!!')
@section('menubar')
    @parent
    購入完了
@endsection

@section('content')
@if(Auth::check())
<p class="user">USER:{{$user->name.'('.$user->email.')'}}</p>
@else
<p>※ログインしていません。(<a href="/login">ログイン</a> | <a href="/register">登録</a>)</p>
@endif
<p>購入が確定されました。</p>
<p><a href="/product/shop" class="button">ショップページに移動する</a></p>
@endsection