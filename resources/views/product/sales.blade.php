@extends("layouts.indexapp")
@section("title",'Sales')
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
<p>売り上げ集計ページ</p>
<table>
     <tr><th>productName</th><th>price</th></tr>
     @foreach($items as $item)   
        <tr>
            <td>{{$item->productname}}</td>
            <td>{{$item->price}}</td>
        </tr>    
    @endforeach    
    </table>
    @foreach($sum as $sum)
    <p>合計売上金：{{$sum->allprice}}円</p>
    @endforeach
@endsection