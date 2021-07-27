@extends("layouts.shopapp")
@section("title",'Search')
@section('menubar')
    @parent
    検索結果ページ
@endsection

@section('content')
@if(Auth::check())
<p class ="user">USER:{{$user->name.'('.$user->email.')'}}<a href="/mypage"><button class="button">マイページへ</button></a></p>
@else
<p>※ログインしていません。(<a href="/login">ログイン</a> | <a href="/register">登録</a>)</p>
@endif
<p>{{$msg}}</p>
<table>
     <tr><th>productName</th><th>price</th><th>detail</th><th>point</th></tr>
     @foreach($items as $item)
    <form action="/product/shop" method = "post">
    @csrf
        <tr>
            <td>{{$item->name}}</td>
            <td>{{$item->price}}</td>
            <td>{{$item->detail}}</td>
            <td>{{$item->point}}</td>
            <td><input type="submit" value ='カートに追加' name="buy" class="button"></td>
            <input type="hidden" name="buy" value="{{$item->name}}">
    </form>   
    <td></td>
            <form action="/review" method='post'>
                <td>
                    @csrf 
                    <input type="submit" value = "レビューへ移動" class="button">
                    <input type="hidden" name="name" value ="{{$item->name}}">
                <td>
            </form>
            <form action="/product/fav" method = "post">
            @csrf
            <td><input type="submit" value = "お気に入りに登録" class="button"></td>   
            <input type="hidden" name = "favName" value = "{{$user->name}}"> 
            <input type="hidden" name = "favProduct" value = "{{$item->name}}">
        </form>
        </tr>    
    @endforeach    
    </table>
    <a href="/product/shop">ショップページへ戻る</a>
@endsection