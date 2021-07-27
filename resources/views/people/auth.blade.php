@extends("layouts.detailapp")
@section("title",'userLogin')
@section('menubar')
    @parent
    ユーザー認証ページ
@endsection

@section('content')
<p>{{$message}}</p>
<p><a href="/register">アカウントを新規作成する</a></p>
<form action="/user/auth" method="post">
    <table>
        @csrf
        <tr><th>mail:</th><td><input type="text" name="email"></td></tr>
        <tr><th>pass:</th><td><input type="password" name="password"></td></tr>
        <tr><th></th><td><input type="submit" value="send" class="button"></td></tr>
    </table>
</form>
@endsection