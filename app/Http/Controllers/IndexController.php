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
        $param = ['items'=>$items,'user'=>$user];
        return view('product.index',$param);
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
        DB::insert('insert into product (name,price,detail) values (:name,:price,:detail)',$param);
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
        $items = DB::select('select * from product');
        return view('product.shop',['items'=>$items]);
    }

    public function postSession(Request $request){
        $msg=$request->input;
        $request->session()->put('msg',$msg);
        $param = ['name'=>$request->input];
        $sesdata = $request->session()->get('msg').'がカートに追加されました。';
        $items = DB::select('select * from product where name=:name',$param);
        return view('product.session',['items'=>$items,'session_data'=>$sesdata]);
    }
}
