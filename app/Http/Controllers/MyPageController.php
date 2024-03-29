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
        $point = DB::select('select point from point where name = :username',$para1);
        $items = DB::select('select * from product where name in (select productName from myPage where name = :username)',$para1);
        $items1 = DB::select('select * from product where name in (select productname from view_history where username = :username limit 3)',$para1);
        $param = ['items'=>$items,'user'=>$user,'point'=>$point,'items1'=>$items1];
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

    public function buy(Request $request){
        $user = Auth::user();
        $para1 = ['username'=>$user->name];
        $items = DB::select('select * from product where name in (select productname from basket where username = :username)',$para1);
        $sum = DB::select('select sum(price) as addprice from product where name in (select productname from basket where username = :username)',$para1);
        $point = DB::select('select sum(point) as addpoint from product where name in (select productname from basket where username = :username)',$para1);
        $param = ['items'=>$items,'user'=>$user,'sum'=>$sum,'point'=>$point];
        return view('Mypage.buy',$param);
    }

    public function thanks(Request $request){
        $user = Auth::user();
        $para1 = ['username'=>$user->name];
        $para2 = [
            'username'=>$user->name,
            'point'=>$request->point,
            ];
        $para3 = [
            'productname'=>$request->productname,
            'price'=>$request->price,
        ];   
        $para4 = ['productname'=>$request->productname];
        //basketを空にする
        DB::delete('delete from basket where username = :username',$para1);
        //ポイントを加算する
        DB::update('update point set name=:username,point=:point + point where name=:username',$para2);
        //売り上げ集計を更新する
        DB::insert('insert into sales (productname,price) values (:productname,:price)',$para3);
        //売れ筋の個数を追加する
        DB::update('update host_selling set productname=:productname,salecount = salecount + 1 where productname=:productname',$para4);
        return view('Mypage.thanks',['user'=>$user]);
    }

    public function viewDel(Request $request){
        $param = [
            'productname'=>$request->productname,
            'username'=>$request->username,
        ];
        DB::delete('delete from view_history where productname = :productname and username = :username',$param);
        return redirect('/mypage');
    }

    public function chat(Request $request){
        $user = Auth::user();
        $para1 = ['username'=>$user->name];
        //ユーザー側表示
        $items = DB::select('select * from chat where name = :username',$para1);
        $param = ['items'=>$items,'user'=>$user];
        return view('/mypage.chat',$param);
    }

    public function chatpost(Request $request){
        $param = [
            'username'=>$request->username,
            'quesres'=>$request->quesres,
            'content'=>$request->content,
        ];
        DB::insert('insert into chat (name,content,quesres) values (:username,:content,:quesres)',$param);
        return redirect('/mypage/chat');
    }

    public function chatUser(Request $request){
        $user = Auth::user();
        $items = DB::select('select * from users');
        $param = ['items'=>$items,'user'=>$user];
        return view('/mypage.user',$param);
    }

    public function chatAdmin(Request $request){
        $user = Auth::user();
        $para1 = [
            'username'=>$request->username,
        ];
        $items = DB::select('select * from chat where name = :username',$para1);
        $param = ['items'=>$items,'user'=>$user];
        return view('/mypage.chatAdmin',$param);
    }

    public function chatAdminpost(Request $request){
        $user = Auth::user();
        $param = [
            'username'=>$request->username,
            'quesres'=>$request->quesres,
            'content'=>$request->content,
        ];
        DB::insert('insert into chat (name,content,quesres) values (:username,:content,:quesres)',$param);
        $para1 = [
            'username'=>$request->username,
        ];
        $items = DB::select('select * from chat where name = :username',$para1);
        $param1 = ['items'=>$items,'user'=>$user];
        return view('/mypage.chatAdmin',$param1);
    }
}