@extends("layouts.contactapp")
@section("title",'ContactAdd')
@section('menubar')
    @parent
    お問い合わせページ
@endsection

@section('content')
<form action="/contact" method = "post">
    @csrf
    <div class = 'form'>
        <p>Name:<input type="text" name = "name"></p>
        <p>mail:<input type="text" name = "mail"></p>
        <p>phone:<input type="text" name = "phone"></p>
        <p>content:<input type="text" name = "content"></p>
        <p><input type="submit" value="send" class="button"></p>
    </div>
</form>
@endsection