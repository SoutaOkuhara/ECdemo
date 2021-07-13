@extends("layouts.companyapp")
@section("title",'CompanyAdd')
@section('menubar')
    @parent
    運営会社新規登録ページ
@endsection

@section('content')
<form action="/company/add" method = "post">
<table>
    @csrf
    <tr><th>Name:</th><td><input type="text" name = "name"></td></tr>
    <tr><th>mail:</th><td><input type="text" name = "mail"></td></tr>
    <tr><th></th><td><input type="submit" value="send"></td></tr>
</table>
</form>
@endsection