@extends("layouts.indexapp")
@section("title",'product')
@section('menubar')
    @parent
    買い物ページ
@endsection

@section('content')
    <table>
     <tr><th>productName</th><th>price</th><th>detail</th></tr>
     @foreach($items as $item)
    <form action="/product/shop" method = "post">
    @csrf
        <tr>
            <td><input type="submit" value ='{{$item->name}}' name="input"></td>
            <td>{{$item->price}}</td>
            <td>{{$item->detail}}</td>
        </tr>
    </form>   
    @endforeach    
    </table>
@endsection