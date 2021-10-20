@extends("layouts.timelineapp")
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
        <p>グッド数:{{$item1->good}}</p>
        <p>バッド数:{{$item1->bad}}</p>
        <form action="/timeline/comment/good">
            <input type="submit" value="good" class="button">
            <input type="hidden" name="userid" value="{{$item1->id}}">
            <input type="hidden" name="productname" value="{{$item1->productname}}">
        </form>    
        <form action="/timeline/comment/bad">
            <input type="submit" value="bad" class="button">
            <input type="hidden" name="userid" value="{{$item1->id}}">
            <input type="hidden" name="productname" value="{{$item1->productname}}">
        </form>  
        <hr>
    @endforeach
    </div>
    <div class="commentAdd">
    <h3>コメント追加</h3>
        <form action="/timeline/comment" method = "post">
        @csrf
            <p>name:<input type="text" name="name"></p>
            <p>comment:<input type="text" name="comment" class="commentform"></p>
            <input type="hidden" name="productname" value="{{$item->name}}">
            <p><input type="submit" value="send" class="button"></p>
        </form>
    </div>
@endsection