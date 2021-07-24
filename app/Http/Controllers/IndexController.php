<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index(Request $request){
        $user = Auth::user();
        $items = DB::select('select * from product');
        return view('product.index',['items'=>$items,'user'=>$user]);
    }

    public function add(Request $request){
        return view('product.add');
    }

    public function create(Request $request){
        $param = [
            'name'=>$request->name,
            'price'=>$request->price,
            'detail'=>$request->detail,
        ];
        DB::insert('insert into product (name,price,detail,point) values (:name,:price,:detail,:price*0.01)',$param);
        return redirect('/product');
    }

    public function del(Request $request){
        $param = ['id'=>$request->id];
        $item = DB::select('select * from product where id = :id',$param);
        return view('product.del',['form'=>$item[0]]);
    }

    public function remove(Request $request){
        $param = ['id'=>$request->id];
        DB::delete('delete from product where id = :id',$param);
        return redirect('/product');
    }

    public function edit(Request $request){
        $param = ['id'=>$request->id];
        $item = DB::select('select * from product where id = :id',$param);
        return view('product.edit',['form'=>$item[0]]);
    }

    public function update(Request $request){
        $param = [
            'id'=>$request->id,
            'name'=>$request->name,
            'price'=>$request->price,
            'detail'=>$request->detail,
        ];
        DB::update('update product set name=:name,price=:price,detail=:detail where id=:id',$param);
        return redirect('/product');
    }

    public function shop(Request $request){
        $user = Auth::user();
        $nowtime = date("H");
        if(12<$nowtime and $nowtime<15){
            $items = DB::select('select *,cast (price * 0.7 as INT) [price] from product');
            $msg = '30%OFFセール中！！';
        }else{
            $items = DB::select('select * from product');
             $msg = 'Welcome to EC!!';
        }
        $param = ['items'=>$items,'user'=>$user,'msg'=>$msg];
        return view('product.shop',$param);
    }

    public function postSession(Request $request){
        $param = [
            'productname'=>$request->buy,
            'username'=>$request->username,
        ];
        DB::insert('insert into basket (username,productname) values (:username,:productname)',$param);
        return redirect('/mypage/basket');
    }

    public function search(Request $request){
        $user = Auth::user();
        $para1 = ['searchName'=>$request->searchName];
        $items = DB::table('product')->whereRaw("name LIKE  '%' || :searchName || '%'",["searchName" => $para1])->get();
        if(empty($items->all())){
            $msg = "検索結果はありませんでした";
        }else{
            $msg = "検索結果";
        }
        $param = ['items'=>$items,'user'=>$user,'msg'=>$msg];
        return view('product.search',$param);
    }

    public function fav(Request $request){
        $param = [
            'favName'=>$request->favName,
            'favProduct'=>$request->favProduct,
        ];
        DB::insert('insert into myPage (name,productName) values (:favName,:favProduct)',$param);
        return redirect('/mypage');
    }
}
