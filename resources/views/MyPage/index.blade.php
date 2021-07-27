@extends("layouts.detailapp")
@section("title",'MyPage')
@section('menubar')
    @parent
    マイページ
@endsection

@section('content')
@if(Auth::check())
<p class="user">
    USER:{{$user->name.'('.$user->email.')'}}<br>
    @foreach($point as $point)
    保有ポイント:{{$point->point}}
    @endforeach
</p>
<form action="/user/logout">
    <input type="submit" value = "LogOut" class="button">
</form>
@else
<p>※ログインしていません。(<a href="/login">ログイン</a> | <a href="/register">登録</a>)</p>
@endif
<p>お気に入り商品一覧</p>
<table>
     <tr><th>productName</th><th>price</th><th>detail</th><th>point</th></tr>
     @foreach($items as $item)   
        <tr>
        <form action="/product/detail" method = "post">
        @csrf  
            <td><input type="submit" name="detail" value="{{$item->name}}" class="button"></td>
        </form>  
            <td>{{$item->price}}</td>
            <td>{{$item->detail}}</td>
            <td>{{$item->point}}</td>
    <form action="/product/shop" method = "post">
    @csrf        
            <td><input type="submit" value ='カートに追加' name="buy" class="button"></td>
            <td><input type="hidden" name="buy" value="{{$item->name}}"></td>
            <input type="hidden" name="username" value="{{$user->name}}">
    </form>   
        <form action="/review" method='post'>
        @csrf 
            <td><input type="submit" value = "レビューへ移動" class="button"><td>
            <input type="hidden" name="name" value ="{{$item->name}}">
        </form>
        <form action="/mypage" method = 'post'>
        @csrf
            <td><input type="submit" value="お気に入りから削除" class="button"></td>
            <input type="hidden" name = "productname" value="{{$item->name}}">
            <input type="hidden" name="username" value="{{$user->name}}">
        </form>
        </tr>    
    @endforeach    
    </table>

    <p>閲覧履歴</p>
    <table>
     <tr><th>productName</th><th>price</th><th>detail</th><th>point</th></tr>
     @foreach($items1 as $item1)   
        <tr>
        <form action="/product/detail" method = "post">
        @csrf  
            <td><input type="submit" name="detail" value="{{$item1->name}}" class="button"></td>
        </form>  
            <td>{{$item1->price}}</td>
            <td>{{$item1->detail}}</td>
            <td>{{$item1->point}}</td>
    <form action="/product/shop" method = "post">
    @csrf        
            <td><input type="submit" value ='カートに追加' name="buy" class="button"></td>
            <td><input type="hidden" name="buy" value="{{$item1->name}}"></td>
            <input type="hidden" name="username" value="{{$user->name}}">
    </form>   
        <form action="/review" method='post'>
        @csrf 
            <td><input type="submit" value = "レビューへ移動" class="button"><td>
            <input type="hidden" name="name" value ="{{$item1->name}}">
        </form>
        <form action="/mypage/view/del" method = 'post'>
        @csrf
            <td><input type="submit" value="閲覧履歴から削除" class="button"></td>
            <input type="hidden" name = "productname" value="{{$item1->name}}">
            <input type="hidden" name="username" value="{{$user->name}}">
        </form>
        </tr>    
    @endforeach    
    </table>
    <p><a href="/product/shop">ショップページに戻る</a></p>
    <p><a href="/mypage/basket">カートページに移動する</a></p>
@endsection