@extends("layouts.companyapp")
@section("title",'CompanyEdit')
@section('menubar')
    @parent
    運営会社編集ページ
@endsection

@section('content')
<form action="/company/edit" method = "post">
<table>
    @csrf
    <input type="hidden" name = "id" value = "{{$form->id}}">
    <tr><th>name:</th><td><input type="text" name = "name" value = "{{$form->name}}"></td></tr>
    <tr><th>mail</th><td><input type="text" name = "mail" value = "{{$form->mail}}"></td></tr>
    <tr><th></th><td><input type="submit" value="send"></td></tr>
</table>
</form>
@endsection