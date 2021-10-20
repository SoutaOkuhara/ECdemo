<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function index(Request $request){
        $user = Auth::user();
        $items = DB::select('select * from contact');
        $items1 = DB::select('select * from ans');
        $param = ['items'=>$items,'user'=>$user,'items1'=>$items1];
        return view('contact.list',$param);
    }

    public function add(Request $request){
        return view('contact.add');
    }

    public function create(Request $request){
        $param = [
            'name'=>$request->name,
            'mail'=>$request->mail,
            'phone'=>$request->phone,
            'content'=>$request->content,
        ];
        DB::insert('insert into contact (name,mail,phone,content) values (:name,:mail,:phone,:content)',$param);
        return redirect('/contact/list');
    }

    public function answerlist(Request $request){
        $user = Auth::user();
        $items = DB::select('select * from contact');
        $param = ['items'=>$items,'user'=>$user];
        return view('admin.contact.anslist',$param);
    }

    public function ansget(Request $request){
        $param = ['id'=>$request->id];
        $item = DB::select('select * from contact where id = :id',$param);
        $item1 = DB::select('select * from contact where id = :id',$param);
        return view('admin.contact.ans',['item'=>$item[0],'form'=>$item1[0]]);
    }

    public function anspost(Request $request){
        $param = [
            'name'=>$request->name,
            'mail'=>$request->mail,
            'phone'=>$request->phone,
            'anstext'=>$request->anstext,
        ];
        DB::insert('insert into ans (name,mail,phone,anstext) values (:name,:mail,:phone,:anstext)',$param);
        return redirect('/contact/list');
    }
}
