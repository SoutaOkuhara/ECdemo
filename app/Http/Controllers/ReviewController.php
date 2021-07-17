<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function index(Request $request){
        $user = Auth::user();
        $para1 = ['name'=>$request->name];
        $item = DB::select('select * from product where name = :name',$para1);
        $items1 = DB::select('select * from review where productName = :name',$para1);
        $param = ['item'=>$item[0],'items1'=>$items1,'user'=>$user];
        return view('review.index',$param);
    }

    public function add(Request $request){
        $param = [
            'name'=>$request->name,
            'star'=>$request->star,
            'detail'=>$request->detail,
            'productName'=>$request->productName,
        ];
        DB::insert('insert into review (name,star,detail,productName) values (:name,:star,:detail,:productName)',$param);
        return redirect('/product/shop');
    }
}
