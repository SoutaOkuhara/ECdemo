@extends("admin.layouts.shopapp")
@section("title",'productEdit')
@section('menubar')
    @parent
    商品編集ページ
@endsection

@section('content')
<form action="/admin/product/edit" method = "post">
<table>
    @csrf
    <input type="hidden" name = "id" value = "{{$form->id}}">
    <tr><th>name:</th><td><input type="text" name = "name" value = "{{$form->name}}"></td></tr>
    <tr><th>price</th><td><input type="text" name = "price" value = "{{$form->price}}"></td></tr>
    <tr><th>detail</th><td><input type="text" name = "detail" value = "{{$form->detail}}"></td></tr>
    <tr><th></th><td><input type="submit" value="send" class = "button"></td></tr>
</table>
</form>
@endsection