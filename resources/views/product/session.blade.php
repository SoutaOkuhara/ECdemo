@extends("layouts.indexapp")
@section("title",'product')
@section('menubar')
    @parent
    買い物籠ページ
@endsection

@section('content')
<p>{{$session_data}}</p>
    <table>
     <tr><th>productName</th><th>price</th><th>detail</th></tr>
     @foreach($items as $item)
        <tr>
            <td>{{$item->name}}</td>
            <td>{{$item->price}}</td>
            <td>{{$item->detail}}</td>
        </tr>
    @endforeach    
    </table>
@endsection