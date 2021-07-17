@extends("layouts.indexapp")
@section("title",'product')
@section('menubar')
    @parent
    商品ページ
@endsection

@section('content')
@if(Auth::check())
<p>USER:{{$user->name.'('.$user->email.')'}}</p>
@else
<p>※ログインしていません。(<a href="/login">ログイン</a> | <a href="/register">登録</a>)</p>
@endif
    <table>
     <tr><th>productName</th><th>price</th><th>detail</th></tr>
     @foreach($items as $item)
        <tr>
            <td>{{$item->name}}</td>
            <td>{{$item->price}}</td>
            <td>{{$item->detail}}</td>
        </tr>
    @endforeach    
    </table>
@endsection