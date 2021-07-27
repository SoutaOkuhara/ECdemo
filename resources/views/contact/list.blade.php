@extends("layouts.detailapp")
@section("title",'ContactList')
@section('menubar')
    @parent
    お問い合わせ一覧ページ
@endsection

@section('content')
<a href="/contact"><button class="button">お問い合わせをする</button></a>
<p>質問テーブル</p>
    <table>
     <tr><th>name</th><th>content</th></tr>
     @foreach($items as $item)
        <tr>
            <td>{{$item->name}}</td>
            <td>{{$item->content}}</td>
        </tr>
    @endforeach    
    </table>
<p>回答テーブル</p>    
<table>
     <tr><th>name</th><th>answer</th></tr>
     @foreach($items1 as $item1)
        <tr>
            <td>{{$item1->name}}</td>
            <td>{{$item1->anstext}}</td>
        </tr>
    @endforeach    
    </table>
@endsection