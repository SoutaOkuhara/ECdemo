@extends("layouts.indexapp")
@section("title",'userAdd')
@section('menubar')
    @parent
    ユーザー新規登録ページ
@endsection

@section('content')
<form action="/user/add" method = "post">
<table>
    @csrf
    <tr><th>Name:</th><td><input type="text" name = "name"></td></tr>
    <tr><th>mail:</th><td><input type="text" name = "mail"></td></tr>
    <tr><th>age:</th><td><input type="text" name = "age"></td></tr>
    <tr><th></th><td><input type="submit" value="send"></td></tr>
</table>
</form>
@endsection