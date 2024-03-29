@extends("admin.layouts.shopapp")
@section("title",'productDetailAdd')
@section('menubar')
    @parent
    商品詳細編集ページ
@endsection

@section('content')
<form action="/admin/product/detailadd" method = "post">
<table>
    @csrf
    <input type="hidden" name = "id" value = "{{$form->id}}">
    <tr><th>name:</th><td><input type="text" name = "name" value = "{{$form->name}}"></td></tr>
    <tr><th>price:</th><td><input type="text" name = "price" value = "{{$form->price}}"></td></tr>
    <tr><th>detail:</th><td><input type="text" name = "detail" value = "{{$form->detail}}"></td></tr>
    <tr><th>photo(URLを入れてください):</th><td><input type="text" name = "photo"></td></tr>
    <tr><th></th><td><input type="submit" value="send" class = "button"></td></tr>
</table>
</form>
@endsection