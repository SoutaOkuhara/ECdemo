<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class MyPageController extends Controller
{
    public function index(Request $request){
        $user = Auth::user();
        $para1 = ['username'=>$user->name];
        $items = DB::select('select * from product where name in (select productName from myPage where name = :username)',$para1);
        $param = ['items'=>$items,'user'=>$user];
        return view('MyPage.index',$param);
    }

    public function del(Request $request){
        $param = [
            'productname'=>$request->productname,
            'username'=>$request->username,
        ];
        DB::delete('delete from myPage where productName = :productname and name = :username',$param);
        return redirect('/mypage');
    }

    public function basket(Request $request){
        $user = Auth::user();
        $para1 = ['username'=>$user->name];
        $items = DB::select('select * from product where name in (select productname from basket where username = :username)',$para1);
        $sum = DB::select('select sum(price) as addprice from product where name in (select productname from basket where username = :username)',$para1);
        $param = ['items'=>$items,'user'=>$user,'sum'=>$sum];
        return view('Mypage.basket',$param);
    }

    public function basketdel(Request $request){
        $param = [
            'productname'=>$request->productname,
            'username'=>$request->username,
        ];
        DB::delete('delete from basket where productname = :productname and username = :username',$param);
        return redirect('/mypage/basket');
    }
}
