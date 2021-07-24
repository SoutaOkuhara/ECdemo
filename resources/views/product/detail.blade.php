@extends("layouts.shopapp")
@section("title",'shopDetail')

@section('content')
@if(Auth::check())
<p class ="user">USER:{{$user->name.'('.$user->email.')'}}<a href="/mypage">マイページへ</a></p>
<hr>
@else
<p>※ログインしていません。(<a href="/login">ログイン</a> | <a href="/register">登録</a>)</p>
@endif
    <div class = "main">
        <h3>商品詳細</h3>
                <p>name:{{$item->name}}</p>
                <p>price:{{$item->price}}</p>
                <p>detail:{{$item->detail}}</p>
                <p><img src="{{$item->photo}}" alt=""></p>
            <form action="/review" method='post'>
            @csrf 
                <input type="submit" value = "レビューへ移動" class="button">
                <input type="hidden" name="name" value ="{{$item->name}}">
            </form>
            <form action="/product/fav" method = "post">
                @csrf
                <input type="submit" value = "お気に入りに登録" class="button">  
                <input type="hidden" name = "favName" value = "{{$user->name}}"> 
                <input type="hidden" name = "favProduct" value = "{{$item->name}}">
            </form>     
    </div>
@endsection