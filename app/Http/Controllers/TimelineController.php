<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TimelineController extends Controller
{
    public function index(Request $request){
        $user = Auth::user();
        $items = DB::select('select * from timeline');
        $param = ['items'=>$items,'user'=>$user,];
        return view('timeline.index',$param);
    }

    public function add(Request $request){
        return view('timeline.add');
    }

    public function create(Request $request){
        $param = [
            'name'=>$request->name,
            'productname'=>$request->productname,
            'detail'=>$request->detail,
            'photo'=>$request->photo,
        ];
        DB::insert('insert into timeline (name,productname,detail,photo,good,bad) values (:name,:productname,:detail,:photo,0,0)',$param);
        return redirect('/timeline');
    }

    public function comment(Request $request){
        $user = Auth::user();
        $para1 = [
            'productname'=>$request->productname,
        ];
        $item = DB::select('select * from prodetail where name = :productname',$para1);
        $items1 = DB::select('select * from TLcomment where productname = :productname',$para1);
        return view('timeline.TLcomment',['item'=>$item[0],'user'=>$user,'items1'=>$items1]);
    }

    public function commentpost(Request $request){
        $user = Auth::user();
        $param = [
            'name'=>$request->name,
            'productname'=>$request->productname,
            'comment'=>$request->comment,
        ];
        DB::insert('insert into TLcomment (name,productname,comment,good,bad) values (:name,:productname,:comment,0,0)',$param);
        $para1 = [
            'productname'=>$request->productname,
        ];
        $item = DB::select('select * from prodetail where name = :productname',$para1);
        $items1 = DB::select('select * from TLcomment where productname = :productname',$para1);
        return view('timeline.TLcomment',['item'=>$item[0],'user'=>$user,'items1'=>$items1]);
    }

    public function good(Request $request){
        $para1 = [
            'productname'=>$request->productname,
        ];
        DB::update('update timeline set good = good + 1  where productname=:productname',$para1);
        return redirect('/timeline');
    }

    public function bad(Request $request){
        $para1 = [
            'productname'=>$request->productname,
        ];
        DB::update('update timeline set bad = bad + 1  where productname=:productname',$para1);
        return redirect('/timeline');
    }
}
