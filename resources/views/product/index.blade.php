@extends("layouts.shopapp")
@section("title",'product')
@section('menubar')
    @parent
    商品一覧ページ
@endsection

@section('content')
@if(Auth::check())
<p class ="user">USER:{{$user->name.'('.$user->email.')'}}<a href="/mypage">マイページへ</a></p>
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
            <form action="/product/del">
                <td><input type="submit" value="削除" class = "button"></td>
                <input type="hidden" name="id" value="{{$item->id}}">
            </form>
            <form action="/product/edit">
                <td><input type="submit" value="編集" class = "button"></td>
                <input type="hidden" name="id" value="{{$item->id}}">
            </form>
        </tr>
    @endforeach    
    </table>
    <p><a href="/product/add">商品追加</a></p>
@endsection