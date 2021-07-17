@extends("layouts.indexapp")
@section("title",'Search')
@section('menubar')
    @parent
    検索結果ページ
@endsection

@section('content')
<p>{{$msg}}</p>
<table>
     <tr><th>productName</th><th>price</th><th>detail</th><th>buy</th><th>review</th></tr>
     @foreach($items as $item)
    <form action="/product/shop" method = "post">
    @csrf
        <tr>
            <td>{{$item->name}}</td>
            <td>{{$item->price}}</td>
            <td>{{$item->detail}}</td>
            <td><input type="submit" value ='カートに追加' name="buy"></td>
            <input type="hidden" name="buy" value="{{$item->name}}">
    </form>   
            <form action="/review" method='post'>
                <td>
                    @csrf 
                    <input type="submit" value = "レビューへ移動">
                    <input type="hidden" name="name" value ="{{$item->name}}">
                <td>
            </form>
        </tr>    
    @endforeach    
    </table>
@endsection