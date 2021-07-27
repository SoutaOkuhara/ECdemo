@extends("layouts.detailapp")
@section("title",'BasketPage')
@section('menubar')
    @parent
    購入確定ページ
@endsection

@section('content')
@if(Auth::check())
<p>USER:{{$user->name.'('.$user->email.')'}}</p>
@else
<p>※ログインしていません。(<a href="/login">ログイン</a> | <a href="/register">登録</a>)</p>
@endif
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
    <p>商品金額：{{$sum->addprice}}円</p>
    <p>手数料：300円</p>
    <hr>
    <p>合計：{{$sum->addprice+300}}円</p>
    @endforeach
    @foreach($point as $point)
        <p>獲得ポイント：{{$point->addpoint}}</p>
    @endforeach
    <form action="/mypage/buy" method = 'post'>
        @csrf
        <input type="submit" value="購入を確定する" class="button">
        @foreach($items as $item) 
            <input type="hidden" name = "point" value="{{$point->addpoint}}">
            <input type="hidden" name = "productname" value="{{$item->name}}">
            <input type="hidden" name = "price" value="{{$item->price}}">
        @endforeach    
    </form>
@endsection