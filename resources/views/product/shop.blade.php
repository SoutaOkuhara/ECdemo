@extends("layouts.shopapp")
@section("title",'shop')

@section('content')
@if(Auth::check())
<p class ="user">USER:{{$user->name.'('.$user->email.')'}}<a href="/mypage">マイページへ</a></p>
<hr>
@else
<p>※ログインしていません。(<a href="/login">ログイン</a> | <a href="/register">登録</a>)</p>
@endif
    <p>商品名検索</p>
    <form action="/product/search" method = "post">
        @csrf
            <tr>
                <td><input type="text" name="searchName"></td>
                <td><input type="submit" value ='検索' name="search" class="button"></td>
    </form>  
    <p><a href="/contact">お問い合わせページへ</a></p>

    <div class = "main">
        <h3>商品一覧</h3>
        <p class = "msg">{{$msg}}</p>
        <table>
        <tr><th>productName</th><th>price</th><th>detail</th><th>point</th></tr>
        @foreach($items as $item)
        <form action="/product/shop" method = "post">
        @csrf
            <tr>
                <td>{{$item->name}}</td>
                <td>{{$item->price}}</td>
                <td>{{$item->detail}}</td>
                <td>{{$item->point}}</td>
                <td><input type="submit" value ='カートに追加' name="buy" class="button"></td>
                <td><input type="hidden" name="buy" value="{{$item->name}}"></td>
                <input type="hidden" name="username" value="{{$user->name}}">
        </form>   
            <form action="/review" method='post'>
            @csrf 
                <td><input type="submit" value = "レビューへ移動" class="button"><td>
                <input type="hidden" name="name" value ="{{$item->name}}">
            </form>
            <form action="/product/fav" method = "post">
                @csrf
                <td><input type="submit" value = "お気に入りに登録" class="button"></td>   
                <input type="hidden" name = "favName" value = "{{$user->name}}"> 
                <input type="hidden" name = "favProduct" value = "{{$item->name}}">
            </form>
            </tr>    
        @endforeach    
        </table>
    </div>
@endsection