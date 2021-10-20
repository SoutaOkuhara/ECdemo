@extends("layouts.detailapp")
@section("title",'contactAdd')
@section('menubar')
    @parent
    お問い合わせ回答フォーム
@endsection

@section('content')
<table>
    <tr><th>name</th><th>mail</th><th>phone</th><th>content</th></tr>
    <tr>
        <td>{{$item->name}}</td>
        <td>{{$item->mail}}</td>
        <td>{{$item->phone}}</td>
        <td>{{$item->content}}</td>
    </tr>  
</table>
<form action="/admin/contact/ans" method = "post">
<table>
    @csrf
    <input type="hidden" name = "id" value = "{{$form->id}}">
    <tr><th>name:</th><td><input type="text" name = "name" value = "{{$form->name}}"></td></tr>
    <tr><th>mail:</th><td><input type="text" name = "mail" value = "{{$form->mail}}"></td></tr>
    <tr><th>phone:</th><td><input type="text" name = "phone" value = "{{$form->phone}}"></td></tr>
    <tr><th>anstext:</th><td><input type="text" name = "anstext"></td></tr>
    <tr><th></th><td><input type="submit" value="send" class = "button"></td></tr>
</table>
</form>
@endsection