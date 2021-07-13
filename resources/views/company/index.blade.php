@extends("layouts.companyapp")
@section("title",'CompanyAdd')
@section('menubar')
    @parent
    運営会社一覧ページ
@endsection

@section('content')
<table>
<tr><th>Name</th><th>mail</th></tr>
     @foreach($items as $item)
        <tr>
            <td>{{$item->name}}</td>
            <td>{{$item->mail}}</td>
        </tr>
    @endforeach  
</table>
@endsection