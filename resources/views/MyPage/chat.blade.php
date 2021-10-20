@extends("layouts.chatapp")
@section("title",'ChatPage')
@section('menubar')
    @parent
    チャットページ
@endsection

@section('content')
@if(Auth::check())
<p class="user">USER:{{$user->name.'('.$user->email.')'}}<a href="/mypage"><button class="button">マイページへ</button></a></p>
@else
<p>※ログインしていません。(<a href="/login">ログイン</a> | <a href="/register">登録</a>)</p>
@endif
<hr>
<div class="main">
<h2>チャット</h2>
<a href=""><button class="button">更新</button></a>
<hr>
<div class="chat">
<div class="userContent">
@foreach($items as $item)
@if($item->quesres == 1)
<img src="" alt="">
<div class="userContent">
<p>{{$user->name}}さん：{{$item->content}}</p>
</div>
@else
<div class="adminContent">
<p>管理者：{{$item->content}}</p>
</div>
@endif
@endforeach 
</div>

</div>

</div>
</div>
<div class="chatform">
    <form action="/mypage/chat" method = "post">
        @csrf
        <p>Content:<input type="text" name="content"></p>
        <p><input type="hidden" name="username" class="button" value="{{$user->name}}"></p>
        <p><input type="hidden" name="quesres" class="button" value= 1></p>
        <p><input type="submit" value="send" class="button"></p>
    </form>
</div>
@endsection