@extends("layouts.detailapp")
@section("title",'BasketPage')
@section('menubar')
    @parent
    カートページ
@endsection

@section('content')
@if(Auth::check())
<p>USER:{{$user->name.'('.$user->email.')'}}<a href="/mypage"><button class="button">マイページへ</button></a></p>
@else
<p>※ログインしていません。(<a href="/login">ログイン</a> | <a href="/register">登録</a>)</p>
@endif
<p><a href="/product/shop">ショップページに移動する</a></p>
<p>カート一覧</p>
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
        <form action="/review" method='post'>
        @csrf 
            <td><input type="submit" value = "レビューへ移動" class="button"><td>
            <input type="hidden" name="name" value ="{{$item->name}}">
        </form>
        <form action="/mypage/basket" method = 'post'>
        @csrf
            <td><input type="submit" value="カートから削除" class="button"></td>
            <input type="hidden" name = "productname" value="{{$item->name}}">
            <input type="hidden" name="username" value="{{$user->name}}">
        </form>
        </tr>    
    @endforeach    
    </table>
    @foreach($sum as $sum)
    <p>合計金額：{{$sum->addprice}}円</p>
    @endforeach
    <a href="/mypage/buy"><button class="button">購入ページへ</button></a>
@endsection