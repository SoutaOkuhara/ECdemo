@extends("layouts.indexapp")
@section("title",'MyPage')
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
    @foreach($items as $item)
    <table>
     <tr><th>productName</th><th>price</th><th>detail</th></tr>
        <tr>
            <td>{{$item->name}}</td>
            <td>{{$item->price}}</td>
            <td>{{$item->detail}}</td>
        </tr>  
    </table>
    @endforeach  
@endsection