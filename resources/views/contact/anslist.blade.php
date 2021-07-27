@extends("layouts.detailapp")
@section("title",'contactAdd')
@section('menubar')
    @parent
    お問い合わせ回答ページ
@endsection

@section('content')
<table>
    <tr><th>name</th><th>mail</th><th>phone</th><th>content</th></tr>
    @foreach($items as $item)
    <tr>
        <td>{{$item->name}}</td>
        <td>{{$item->mail}}</td>
        <td>{{$item->phone}}</td>
        <td>{{$item->content}}</td>
        <form action="/contact/ans">
            <td><input type="submit" value="回答する" class = "button"></td>
            <input type="hidden" name="id" value="{{$item->id}}">
        </form>
    </tr>
@endforeach    
</table>
@endsection

