@extends("layouts.reviewapp")
@section("title",'ChatUser')
@section('menubar')
    @parent
    チャットユーザー選択ページ
@endsection

@section('content')
<div class="main">
<table>
     <tr><th>name</th><th>mail</th></tr>
     @foreach($items as $item)
        <tr>
        <form action="/mypage/chatAdmin">
        @csrf
            <td><input type="submit" value="{{$item->name}}" name = "username"></td>
        </form>
            <td>{{$item->email}}</td>
        </tr>
    @endforeach    
</table>
</div>
@endsection