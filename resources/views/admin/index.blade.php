@extends("admin.layouts.master")
@section("title",'Home(管理者用)')
@section('menubar')
    @parent
    ホーム
@endsection

@section('content')

<div class="contents">
    <div class="indent">
        <a href="/admin/product"><button class="button">商品管理ページ</button></a>
    </div>  
    <div class="indent"> 
        <a href="/admin/company"><button class="button">運営会社管理ページ</button></a>
    </div>  
    <div class="indent">
        <a href="/admin/contact"><button class="button">お問い合わせ管理ページ</button></a>
    </div> 
    <div class="indent">
        <a href="/admin/mypage/chatUser"><button class="button">チャットページ</button></a>
    </div> 
    <div class="indent">
        <a href="/admin/timeline/"><button class="button">タイムライン管理ページ</button></a>
    </div> 
</div> 
@endsection