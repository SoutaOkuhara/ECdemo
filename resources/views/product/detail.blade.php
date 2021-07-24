@extends("layouts.shopapp")
@section("title",'shopDetail')

@section('content')
@if(Auth::check())
<p class ="user">USER:{{$user->name.'('.$user->email.')'}}<a href="/mypage">マイページへ</a></p>
<hr>
@else
<p>※ログインしていません。(<a href="/login">ログイン</a> | <a href="/register">登録</a>)</p>
@endif
<p><a href="/product/shop">ショップに戻る</a></p>
    <div class = "main">
        <h3>商品詳細</h3>
                <p>name:{{$item->name}}</p>
                <p>price:{{$item->price}}</p>
                <p>detail:{{$item->detail}}</p>
                <p><img src="{{$item->photo}}" alt=""></p>
            <p>レビュー</p>
    <table>
     <tr><th>Name</th><th>星(1~5)</th><th>本文</th></tr>
     @foreach($items1 as $item1)
        <tr>
            <td>{{$item1->name}}</td>
            <td>{{$item1->star}}</td>
            <td>{{$item1->detail}}</td>
        </tr>  
        @endforeach 
    </table> 
    <form action="/product/fav" method = "post">
        @csrf
        <input type="submit" value = "お気に入りに登録" class="button">  
        <input type="hidden" name = "favName" value = "{{$user->name}}"> 
        <input type="hidden" name = "favProduct" value = "{{$item->name}}">
    </form>    
    <form action="/product/shop" method = "post">
    @csrf        
        <td><input type="submit" value ='カートに追加' name="buy" class="button"></td>
        <td><input type="hidden" name="buy" value="{{$item->name}}"></td>
        <input type="hidden" name="username" value="{{$user->name}}">
    </form>  
    </div>
@endsection