<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function index(Request $request){
        $items = DB::select('select * from contact');
        return view('contact.list',['items'=>$items]);
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
}
