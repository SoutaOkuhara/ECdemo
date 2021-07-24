@extends("layouts.indexapp")
@section("title",'product.reviw')
@section('menubar')
    @parent
    商品レビューページ
@endsection

@section('content')
@if(Auth::check())
<p>USER:{{$user->name.'('.$user->email.')'}}</p>
@else
<p>※ログインしていません。(<a href="/login">ログイン</a> | <a href="/register">登録</a>)</p>
@endif
    <table>
     <tr><th>productName</th><th>price</th><th>detail</th></tr>
        <tr>
            <td>{{$item->name}}</td>
            <td>{{$item->price}}</td>
            <td>{{$item->detail}}</td>
        </tr>
    </table>
    <p>レビュー</p>
    @foreach($items1 as $item1)
    <table>
     <tr><th>Name</th><th>星(1~5)</th><th>本文</th></tr>
        <tr>
            <td>{{$item1->name}}</td>
            <td>{{$item1->star}}</td>
            <td>{{$item1->detail}}</td>
        </tr>  
    </table>
    @endforeach 
    <p>レビュー投稿欄</p> 
    <form action="/review/add" method="post">
        @csrf
            <p>Name:<input type="text" name = "name"></p>
            <p>星:(1~5で回答)<input type="text" name = "star"></p>
            <p>本文:<input type="text" name = "detail"></p>
            <p><input type="submit" value="send"></p>
            <input type="hidden" name="productName" value="{{$item->name}}">
    </form>
@endsection