@extends("layouts.mypageapp")
@section("title",'product')
@section('menubar')
    @parent
    商品一覧ページ
@endsection

@section('content')
@if(Auth::check())
<p class ="user">USER:{{$user->name.'('.$user->email.')'}}<a href="/mypage"><button class="button">マイページへ</button></a></p>
@else
<p>※ログインしていません。(<a href="/login">ログイン</a> | <a href="/register">登録</a>)</p>
@endif
<div class="main">
<table>
     <tr><th>productName</th><th>price</th><th>detail</th><th>point</th></tr>
     @foreach($items as $item)
        <tr>
        <form action="/product/detailadd">
            <td><input type="submit" name = "detail" value="{{$item->name}}"></td>
        </form>
            <td>{{$item->price}}</td>
            <td>{{$item->detail}}</td>
            <td>{{$item->point}}</td>
            <form action="/product/del">
                <td><input type="submit" value="削除" class = "button"></td>
                <input type="hidden" name="id" value="{{$item->id}}">
            </form>
            <form action="/product/edit">
                <td><input type="submit" value="編集" class = "button"></td>
                <input type="hidden" name="id" value="{{$item->id}}">
            </form>
            <form action="/product/detail" method = "post">
                @csrf  
                <td><input type="submit" value="詳細へ" class="button"></td>
            <input type="hidden" name="detail" value="{{$item->name}}">
            </form> 
        </tr>
    @endforeach    
    </table>
</div>
    <p><a href="/product/add" class="button">商品追加</a></p>
    <p><a href="/product/sales" class="button">売り上げ集計</a></p>
@endsection