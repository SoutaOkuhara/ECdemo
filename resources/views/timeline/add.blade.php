@extends("layouts.shopapp")
@section("title",'TimeLineAdd')
@section('menubar')
    @parent
    タイムライン記事追加ページ
@endsection

@section('content')
<form action="/admin/timeline/add" method = "post">
<table>
    @csrf
    <tr><th>会社名:</th><td><input type="text" name = "name"></td></tr>
    <tr><th>商品名:</th><td><input type="text" name = "productname"></td></tr>
    <tr><th>詳細:</th><td><input type="text" name = "detail"></td></tr>
    <tr><th>photo(URLを入れてください):</th><td><input type="text" name = "photo"></td></tr>
    <tr><th></th><td><input type="submit" value="send" class = "button"></td></tr>
</table>
</form>
@endsection