@extends("layouts.detailapp")
@section("title",'TimeLine')
@section('menubar')
    @parent
    タイムラインページ
@endsection

@section('content')
<h2>TimeLine</h2>
<p>様々な会社がおすすめしたい商品が掲載されています！！</p>
<div class="main">
@foreach($items as $item)
    <div class="article">
        <p>会社名：{{$item->name}}</p>
        <p>商品名：{{$item->productname}}</p>
        <img src="{{$item->photo}}" alt="">
        <p>詳細：{{$item->detail}}</p>
        <p>グッド数:{{$item->good}}</p>
        <p>バッド数:{{$item->bad}}</p>
        <form action="/timeline/good">
            <input type="submit" value="good" class="button">
            <input type="hidden" name="productname" value="{{$item->productname}}">
        </form>    
        <form action="/timeline/bad">
            <input type="submit" value="bad" class="button">
            <input type="hidden" name="productname" value="{{$item->productname}}">
        </form>    
        <form action="/timeline/comment">
        @csrf  
        @if(Auth::check())
            <p><input type="submit" value="コメントする" class="button"></p>
            <input type="hidden" name="productname" value="{{$item->productname}}">
        @else
        @endif
    </div>
@endforeach 
</div>   
@endsection

