@extends("layouts.reviewapp")
@section("title",'productReviw')
@section('menubar')
    @parent
    商品レビューページ
@endsection

@section('content')
<div class="main">
<p>商品</p>
<table>
     <tr><th>productName</th><th>price</th><th>detail</th></tr>
        <tr>
            <td>{{$item->name}}</td>
            <td>{{$item->price}}</td>
            <td>{{$item->detail}}</td>
        </tr>
    </table>
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
</div>
<div class="main1">
<p>レビュー投稿欄</p> 
    <form action="/review/add" method="post">
        @csrf
            <p>Name:<input type="text" name = "name"></p>
            <p>星:(1~5で回答)<input type="text" name = "star"></p>
            <p>本文:<input type="text" name = "detail"></p>
            <p><input type="submit" value="send" class="button"></p>
            <input type="hidden" name="productName" value="{{$item->name}}">
    </form>
</div>
@endsection