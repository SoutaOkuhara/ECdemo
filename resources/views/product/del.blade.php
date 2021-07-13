@extends("layouts.indexapp")
@section("title",'ProductDelete')
@section('menubar')
    @parent
    商品削除ページ
@endsection

@section('content')
<form action="/product/del" method = "post">
<table>
    @csrf
    <input type="hidden" name = "id" value = "{{$form->id}}">
    <tr><th>name:</th><td><input type="text" name = "name" value = "{{$form->name}}"></td></tr>
    <tr><th>price</th><td><input type="text" name = "price" value = "{{$form->price}}"></td></tr>
    <tr><th>detail</th><td><input type="text" name = "detail" value = "{{$form->detail}}"></td></tr>
    <tr><th></th><td><input type="submit" value="send"></td></tr>
</table>
</form>
@endsection