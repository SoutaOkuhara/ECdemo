@extends("layouts.homeapp")
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
<div class="contents">
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
</div> 
    <div class="rank">
    <h3>売れ筋ランキング</h3>
    <table>
    <tr><th>productName</th><th>price</th><th>detail</th><th>point</th></tr>
    @foreach($items as $item)
    <tr>
        <form action="/product/detail" method = "post">
        @csrf  
            <td><input type="submit" name="detail" value="{{$item->name}}" class="button"></td>
        </form> 
                <td>{{$item->price}}</td>
                <td>{{$item->detail}}</td>
                <td>{{$item->point}}</td>
    </tr>    
    @endforeach    
    </table>
</div>
@endsection