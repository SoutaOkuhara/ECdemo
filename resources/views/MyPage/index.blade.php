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
<p>お気に入り商品一覧</p>
<table>
     <tr><th>productName</th><th>price</th><th>detail</th></tr>
     @foreach($items as $item)   
     <form action="/product/shop" method = "post">
    @csrf
        <tr>
            <td>{{$item->name}}</td>
            <td>{{$item->price}}</td>
            <td>{{$item->detail}}</td>
            <td><input type="submit" value ='カートに追加' name="buy"></td>
            <td><input type="hidden" name="buy" value="{{$item->name}}"></td>
    </form>   
        <form action="/review" method='post'>
        @csrf 
            <td><input type="submit" value = "レビューへ移動"><td>
            <input type="hidden" name="name" value ="{{$item->name}}">
        </form>
        </tr>    
    @endforeach    
    </table>
@endsection