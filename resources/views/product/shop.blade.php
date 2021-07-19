@extends("layouts.indexapp")
@section("title",'shop')
@section('menubar')
    @parent
    買い物ページ
@endsection

@section('content')
@if(Auth::check())
<p>USER:{{$user->name.'('.$user->email.')'}}</p>
@else
<p>※ログインしていません。(<a href="/login">ログイン</a> | <a href="/register">登録</a>)</p>
@endif
    <p>商品名検索</p>
    <form action="/product/search" method = "post">
        @csrf
            <tr>
                <td><input type="text" name="searchName"></td>
                <td><input type="submit" value ='検索' name="search"></td>
    </form>  
    <p><a href="/contact">お問い合わせページへ</a></p>
    <p>商品一覧</p>
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
        <form action="/product/fav" method = "post">
            @csrf
            <td><input type="submit" value = "お気に入りに登録"></td>   
            <input type="hidden" name = "favName" value = "{{$user->name}}"> 
            <input type="hidden" name = "favProduct" value = "{{$item->name}}">
        </form>
        </tr>    
    @endforeach    
    </table>
@endsection