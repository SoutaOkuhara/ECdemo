@extends("admin.layouts.chatapp")
@section("title",'ChatAdminPage')
@section('menubar')
    @parent
    チャット管理者用ページ
@endsection

@section('content')
@if(Auth::check())
<p class="user">USER:{{$user->name.'('.$user->email.')'}}<a href="/mypage"><button class="button">マイページへ</button></a></p>
@else
<p>※ログインしていません。(<a href="/login">ログイン</a> | <a href="/register">登録</a>)</p>
@endif
<hr>
<div class="main">
<h2>チャット(管理者用)</h2>
<a href=""><button class="button">更新</button></a>
<hr>
<div class="chat">

<div class="userContent">
@foreach($items as $item)
@if($item->quesres == 1)
<div class="userContent">
<p>{{$item->content}}</p>
</div>
@else
<div class="adminContent">
<p>{{$item->content}}</p>
</div>
@endif
@endforeach 
</div>

</div>

</div>
</div>
    <form action="/admin/mypage/chatAdmin" method = "post">
        @csrf
        <p>Content:<input type="text" name="content"></p>
        <p><input type="hidden" name="username" class="button" value="{{$item->name}}"></p>
        <p><input type="hidden" name="quesres" class="button" value= 2></p>
        <p><input type="submit" value="send" class="button"></p>
    </form>
@endsection