@extends("layouts.detailapp")
@section("title",'CompanyDelete')
@section('menubar')
    @parent
    運営会社削除ページ
@endsection

@section('content')
<form action="/company/del" method = "post">
<table>
    @csrf
    <input type="hidden" name = "id" value = "{{$form->id}}">
    <tr><th>name:</th><td><input type="text" name = "name" value = "{{$form->name}}"></td></tr>
    <tr><th>mail</th><td><input type="text" name = "mail" value = "{{$form->mail}}"></td></tr>
    <tr><th></th><td><input type="submit" value="send" class="button"></td></tr>
</table>
</form>
@endsection