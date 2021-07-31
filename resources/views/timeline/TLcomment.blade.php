@extends("layouts.detailapp")
@section("title",'TLComment')
@section('menubar')
    @parent
    コメントページ
@endsection
@section('content')
@if(Auth::check())
<p class ="user">USER:{{$user->name.'('.$user->email.')'}}<a href="/mypage"><button class="button">マイページへ</button></a></p>
<hr>
@else
<p>※ログインしていません。(<a href="/login">ログイン</a> | <a href="/register">登録</a>)</p>
@endif
<h3>商品詳細</h3>
    <div class = "main">
        <div class="detail">
            <p>商品名:{{$item->name}}</p>
            <p>price:{{$item->price}}</p>
            <p>詳細:{{$item->detail}}</p>
        </div>
            <p><img src="{{$item->photo}}" alt=""></p>
    </div>
    <div class="comment">
    <h3>コメント欄</h3>
    @foreach($items1 as $item1)
        <p>名前：{{$item1->name}}</p>
        <p>{{$item1->comment}}</p>
        <hr>
    @endforeach
    </div>
    <div class="commentAdd">
    <h3>コメント追加</h3>
        <form action="/timeline/comment" method = "post">
        @csrf
            <p>name:<input type="text" name="name"></p>
            <p>comment:<input type="text" name="comment"></p>
            <input type="hidden" name="productname" value="{{$item->name}}">
            <p><input type="submit" value="send" class="button"></p>
        </form>
    </div>
@endsection