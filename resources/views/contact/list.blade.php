@extends("layouts.contactapp")
@section("title",'ContactList')
@section('menubar')
    @parent
    お問い合わせ一覧ページ
@endsection

@section('content')
@if(Auth::check())
<p>USER:{{$user->name.'('.$user->email.')'}}</p>
@else
<p>※ログインしていません。(<a href="/login">ログイン</a> | <a href="/register">登録</a>)</p>
@endif
    <table>
     <tr><th>name</th><th>mail</th><th>phone</th><th>content</th></tr>
     @foreach($items as $item)
        <tr>
            <td>{{$item->name}}</td>
            <td>{{$item->mail}}</td>
            <td>{{$item->phone}}</td>
            <td>{{$item->content}}</td>
        </tr>
    @endforeach    
    </table>
@endsection