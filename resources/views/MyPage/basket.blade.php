@extends("layouts.indexapp")
@section("title",'BasketPage')
@section('menubar')
    @parent
    マイページ
@endsection

@section('content')
@if(Auth::check())
<p>USER:{{$user->name.'('.$user->email.')'}}</p>
@else
<p>※ログインしていません。(<a href="/login">ログイン</a> | <a href="/register">登録</a>)</p>
@endif
<p>カート一覧</p>
<table>
     <tr><th>productName</th><th>price</th><th>detail</th></tr>
     @foreach($items as $item)   
     <form action="/product/shop" method = "post">
    @csrf
        <tr>
            <td>{{$item->name}}</td>
            <td>{{$item->price}}</td>
            <td>{{$item->detail}}</td>
    </form>   
        <form action="/review" method='post'>
        @csrf 
            <td><input type="submit" value = "レビューへ移動"><td>
            <input type="hidden" name="name" value ="{{$item->name}}">
        </form>
        <form action="/mypage/basket" method = 'post'>
        @csrf
            <td><input type="submit" value="カートから削除"></td>
            <input type="hidden" name = "productname" value="{{$item->name}}">
            <input type="hidden" name="username" value="{{$user->name}}">
        </form>
        </tr>    
    @endforeach    
    </table>
    @foreach($sum as $sum)
    <p>合計金額：{{$sum->addprice}}円</p>
    @endforeach
    <form action="">
        <input type="submit" value = "購入する">
    </form>
    <p><a href="/product/shop">ショップページに移動する</a></p>
    <p><a href="/mypage">マイページに移動する</a></p>
@endsection