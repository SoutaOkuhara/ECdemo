@extends("layouts.detailapp")
@section("title",'CompanyAdd')
@section('menubar')
    @parent
    運営会社一覧ページ
@endsection

@section('content')
@if(Auth::check())
<p class="user">USER:{{$user->name.'('.$user->email.')'}}</p>
@else
<p>※ログインしていません。(<a href="/login">ログイン</a> | <a href="/register">登録</a>)</p>
@endif
<table>
<tr><th>Name</th><th>mail</th></tr>
     @foreach($items as $item)
        <tr>
            <td>{{$item->name}}</td>
            <td>{{$item->mail}}</td>
            <form action="/company/del">
                <td><input type="submit" value="削除" class="button"></td>
                <input type="hidden" name="id" value="{{$item->id}}">
            </form>
            <form action="/company/edit">
                <td><input type="submit" value="編集" class="button"></td>
                <input type="hidden" name="id" value="{{$item->id}}">
            </form>
        </tr>
    @endforeach  
</table>
<p><a href="/company/add">運営会社追加</a></p>
@endsection