@extends("layouts.detailapp")
@section("title",'user')
@section('menubar')
    @parent
    ユーザー一覧ページ
@endsection

@section('content')
@if(Auth::check())
<p class="user">USER:{{$user->name.'('.$user->email.')'}}</p>
<a href="/user/auth">別のユーザーでログインする</a>
@else
<p>※ログインしていません。(<a href="/login">ログイン</a> | <a href="/register">登録</a>)</p>
@endif
    <table>
     <tr><th>name</th><th>mail</th></tr>
     @foreach($items as $item)
        <tr>
            <td>{{$item->name}}</td>
            <td>{{$item->email}}</td>
        </tr>
    @endforeach    
    </table>
@endsection