@extends("admin.layouts.shopapp")
@section("title",'productAdd')
@section('menubar')
    @parent
    商品新規登録ページ
@endsection

@section('content')
<form action="/admin/product/add" method = "post">
<table>
    @csrf
    <tr><th>Name:</th><td><input type="text" name = "name"></td></tr>
    <tr><th>price:</th><td><input type="text" name = "price"></td></tr>
    <tr><th>detail:</th><td><input type="text" name = "detail"></td></tr>
    <tr><th></th><td><input type="submit" value="send" class = "button"></td></tr>
</table>
</form>
@endsection