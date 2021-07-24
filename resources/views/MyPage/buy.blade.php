@extends("layouts.indexapp")
@section("title",'BasketPage')
@section('menubar')
    @parent
    カートページ
@endsection

@section('content')
@if(Auth::check())
<p>USER:{{$user->name.'('.$user->email.')'}}</p>
@else
<p>※ログインしていません。(<a href="/login">ログイン</a> | <a href="/register">登録</a>)</p>
@endif
<p>購入ページ</p>
<table>
     <tr><th>productName</th><th>price</th><th>point</th></tr>
     @foreach($items as $item)   
        <tr>
            <td>{{$item->name}}</td>
            <td>{{$item->price}}</td>
            <td>{{$item->point}}</td> 
        </tr>    
    @endforeach    
    </table>
    @foreach($sum as $sum)
    <p>合計金額：{{$sum->addprice}}円</p>
    @endforeach
    @foreach($point as $point)
    <p>獲得ポイント：{{$point->addpoint}}</p>
    <form action="/mypage/buy" method = 'post'>
        @csrf
            <input type="submit" value="購入を確定する">
            <input type="hidden" name = "point" value="{{$point->addpoint}}">
    </form>
    @endforeach
@endsection